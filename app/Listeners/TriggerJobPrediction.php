<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
                'description',
                DB::raw('YEAR(posted_on) as year'),
                DB::raw('COUNT(*) as total_jobs')
            )
            ->groupBy('description', 'year')
            ->orderBy('year')
            ->get();

        $formattedData = [];

        foreach ($jobs as $job) {
            $formattedData[] = [
                'title' => $job->description,
                'year' => $job->year,
                'total_jobs' => $job->total_jobs
            ];
        }

        // Send to Python API
        Http::post('http://127.0.0.1:8000/predict', $formattedData);
    }
}
