<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TriggerJobPrediction
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        //

        $jobs = DB::table('jobs')
        ->select(
            'title',
            DB::raw('YEAR(posted_on) as year'),
            DB::raw('COUNT(*) as total_jobs')
        )
        ->groupBy('title', 'year')
        ->orderBy('year')
        ->get();

    $formattedData = [];

    // Prepare data to send to Flask API
    foreach ($jobs as $job) {
        $formattedData[] = [
            'title' => $job->title,
            'year' => $job->year,
            'total_jobs' => $job->total_jobs
        ];
    }
    // Send data to Python API and get the predictions
    Log::info('Jobs data sent to prediction:', ['jobs' => $formattedData]);

    $response = Http::post('http://127.0.0.1:5000/predict', [
        'jobs' => $formattedData
    ]);
    Log::info('Response from prediction service:', ['body' => $response->body()]);

    // If the response is successful, cache the predictions
    if ($response->successful()) {

        $predictions = $response->json(); // Get the prediction data

        // Cache the predictions for later use (e.g., 1 hour)
        Cache::put('job_predictions', $predictions, now()->addHours(1));

        // Optionally, log the predictions to check the data
        \Log::info('Predictions cached: ', $predictions);
    }
    }
}
