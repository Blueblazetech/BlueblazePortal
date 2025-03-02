<?php

namespace App\Livewire\Applications;

use Livewire\Component;
use App\Models\JobApplicant;

class AllApplication extends Component
{
    public function render()
    {
        $results = JobApplicant::where('status','pending')->orderby('rank','DESC')->get();
        return view('livewire.applications.all-application', compact('results'));
    }
}
