<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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
