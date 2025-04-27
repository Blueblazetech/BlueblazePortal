<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobTrendsController extends Controller
{
    //
    public function getPredictedJobTrends()
    {
        // Suppose you cached predictions earlier inside the event.
        $predictions = Cache::get('job_predictions', []);

        return response()->json($predictions);
    }
}
