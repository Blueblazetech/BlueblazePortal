<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;
class PostedJob extends Component
{
    public function render()
    {

        $results = Job::with('category')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('livewire.jobs.posted-job', ['results'=>$results]);
    }
}
