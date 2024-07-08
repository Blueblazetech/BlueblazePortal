<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithPagination;

class PostedJob extends Component
{

    use WithPagination;

    public $search;

    public function render()

    {

        $results = Job::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.client.posted-job', ['results'=>$results]);
    }
}
