<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');
    }

        public function adminDashboard(){

            return view('admin.admin-home');

        }

        public function postedJobs(){

        return view('jobs.posted-jobs');
        }

        public function postJobs(){
            return view('jobs.post-job');
        }
        public function pendingJobs(){

            return view('jobs.pending-jobs');
        }

        public function appliedJobs(){

            return view('jobs.occupied-jobs');
        }

        public function expiredJobs(){

            return view('jobs.expired-jobs');

        }

        public function approvedJobs(){

            return view('jobs.approved-jobs');
        }

        public function activeJobs(){

            return view('jobs.active-jobs');
        }

        public function approvedAplications(){

            return view('applications.approved-applications');
        }
        public function allApplications(){

            return view('applications.all-applications');
        }

        public function cancelledApplications(){

            return view('applications.cancelled-applications');
        }
        public function expiredApplications(){

            return view('applications.expired-applications');
        }
        public function pendingApplications(){

            return view('applications.pending-applications');
        }
        public function rejectedApplications(){

            return view('applications.rejected-applications');
        }
        public function reversedApplications(){

            return view('applications.reversed-applications');
        }

        public function userHome(){

            return view('client.client-home');
        }

        public function login(){

            return view('auth.login');
        }
    }
