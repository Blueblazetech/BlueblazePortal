print('Running flask now')

from flask import Flask, request, jsonify
import pandas as pd
from statsmodels.tsa.arima.model import ARIMA

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()

    # Check if data actually has jobs key
    if 'jobs' not in data:
        return jsonify([])  # return empty if no jobs provided

    df = pd.DataFrame(data['jobs'])

    predictions = []

    # Group by job title
    for title, group in df.groupby('title'):
        group = group.set_index('year')
        group.index = pd.to_datetime(group.index, format='%Y')  # ensure datetime index
        group = group.asfreq('Y')

        # Drop any rows with NaN
        group = group.dropna()

        if len(group) == 0:
            continue  # skip empty groups

        if len(group) >= 2:
            # Use ARIMA if we have enough data
            try:
                model = ARIMA(group['total_jobs'], order=(1, 1, 1))
                model_fit = model.fit()
                forecast = model_fit.forecast(steps=5)
            except Exception as e:
                print(f"ARIMA error for {title}: {str(e)}")
                forecast = [group['total_jobs'].iloc[-1]] * 5  # fallback: repeat last value
        else:
            # If only 1 record, simulate growth
            last_value = group['total_jobs'].iloc[-1]
            forecast = [last_value + (i * 1) for i in range(1, 6)]  # +1 every year

        start_year = group.index[-1].year + 1

        for i, value in enumerate(forecast):
            predictions.append({
                'title': title,
                'year': start_year + i,
                'predicted_jobs': max(0, int(value))  # make sure no negative jobs
            })

    return jsonify(predictions)

if __name__ == '__main__':
    app.run(debug=False)
