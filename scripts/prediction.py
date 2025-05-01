import sys
import os
from flask import Flask, request, jsonify
import pandas as pd
from statsmodels.tsa.arima.model import ARIMA

# Force Python to flush output immediately
os.environ['PYTHONUNBUFFERED'] = "1"

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    print("Data received:", data)

    if not data or 'jobs' not in data:
        return jsonify({"error": "Invalid input format"}), 400

    df = pd.DataFrame(data['jobs'])
    print("DataFrame created:\n", df)

    predictions = []

    for title, group in df.groupby('title'):
        print(f"\nProcessing title: {title}")
        print(group)

        if group.empty:
            print(f"No data available for {title}. Skipping prediction.")
            continue

        try:
            # 1. Convert year to datetime (first day of year)
            group['year'] = pd.to_datetime(group['year'], format='%Y')

            # 2. Shift all dates to December 31 of that year
            group['year'] = group['year'] + pd.offsets.YearEnd(0)

            # 3. Only keep year and total_jobs
            group = group[['year', 'total_jobs']]

            # 4. Set year as index
            group = group.set_index('year')

            # 5. Reindex with year-end frequency
            group = group.asfreq('YE')

            # 6. Forward fill missing total_jobs
            group['total_jobs'] = group['total_jobs'].ffill()

            print(f"Prepared time series for {title}:\n", group)

            start_year = group.index[-1].year + 1 if group.index.size > 0 else 2025

            if group['total_jobs'].count() < 2:
                print(f"Only 1 record for {title}, replicating last value...")
                last_value = group['total_jobs'].iloc[-1] if not group.empty else 0

                if pd.isna(last_value):
                    last_value = 0

                for i in range(5):
                    predictions.append({
                        'title': title,
                        'year': start_year + i,
                        'predicted_jobs': int(last_value)
                    })
            else:
                try:
                    model = ARIMA(group['total_jobs'], order=(1, 1, 1))
                    model_fit = model.fit()

                    forecast = model_fit.forecast(steps=5)
                    print(f"Forecast for {title}:", forecast.tolist())

                    for i, value in enumerate(forecast):
                        predicted_jobs = max(0, int(value))

                        predictions.append({
                            'title': title,
                            'year': start_year + i,
                            'predicted_jobs': predicted_jobs
                        })
                except Exception as e:
                    print(f"ARIMA failed for {title} with error: {e}")
                    last_value = group['total_jobs'].iloc[-1] if not group.empty else 0

                    if pd.isna(last_value):
                        last_value = 0

                    for i in range(5):
                        predictions.append({
                            'title': title,
                            'year': start_year + i,
                            'predicted_jobs': int(last_value)
                        })
        except Exception as e:
            print(f"Failed to process {title} with error: {e}")
            continue

    print("\nFinal predictions:", predictions)

    return jsonify(predictions)

if __name__ == '__main__':
    print("Running flask now", flush=True)
    app.run(debug=True, port=5000)
