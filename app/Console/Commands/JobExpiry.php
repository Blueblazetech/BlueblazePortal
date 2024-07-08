<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;

class JobExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:job-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command checks the expiry date of posted jobs and set the status accordingly';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Job::updateJobStatus();
        $this->info('Job statuses updated for today successfully');
    }
}
