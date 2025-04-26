from flask import Flask, request, jsonify
import pandas as pd
from statsmodels.tsa.arima.model import ARIMA

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    df = pd.DataFrame(data)

    predictions = []

    # Group by job title
    for title, group in df.groupby('title'):
        group = group.set_index('year')
        group = group.asfreq('Y')

        if len(group) < 2:
            continue  # Skip if not enough data to train

        model = ARIMA(group['total_jobs'], order=(1, 1, 1))
        model_fit = model.fit()

        forecast = model_fit.forecast(steps=5)

        start_year = group.index[-1].year + 1

        for i, value in enumerate(forecast):
            predictions.append({
                'title': title,
                'year': start_year + i,
                'predicted_jobs': int(value)
            })

    return jsonify(predictions)

if __name__ == '__main__':
    app.run(debug=True)
