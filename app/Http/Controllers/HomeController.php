<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Age;
use App\Models\Job;
use App\Models\Salary;
use App\Models\JobSkill;
use App\Models\JobTitle;
use App\Models\Locations;
use App\Models\Experience;
use App\Models\JobCategory;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use App\Models\JobAttachment;
use App\Models\EmploymentType;
use App\Models\JobCertificate;
use App\Models\JobPostHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\AcademicQualification;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    // public function index()
    // {
    //     return view('auth.login');
    // }
    public function index()
    {
        return view('admin.admin-home');
    }
    public function adminDashboard()
    {

        return view('admin.admin-home');

    }

    public function postedJobs()
    {

        return view('jobs.posted-jobs');
    }

    public function postJobs()
    {
        return view('jobs.post-job');
    }
    public function pendingJobs()
    {

        return view('jobs.pending-jobs');
    }

    public function appliedJobs()
    {

        return view('jobs.occupied-jobs');
    }

    public function expiredJobs()
    {

        return view('jobs.expired-jobs');

    }

    public function approvedJobs()
    {

        return view('jobs.approved-jobs');
    }

    public function activeJobs()
    {

        return view('jobs.active-jobs');
    }

    public function approvedAplications()
    {

        return view('applications.approved-applications');
    }
    public function allApplications()
    {

        return view('applications.all-applications');
    }

    public function cancelledApplications()
    {

        return view('applications.cancelled-applications');
    }
    public function expiredApplications()
    {

        return view('applications.expired-applications');
    }
    public function pendingApplications()
    {

        return view('applications.pending-applications');
    }
    public function rejectedApplications()
    {

        return view('applications.rejected-applications');
    }
    public function reversedApplications()
    {

        return view('applications.reversed-applications');
    }

    public function general()
    {

        return view('client.client-home');
    }

    public function login()
    {

        return view('auth.login');
    }

    public function Post()
    {

        $employmenType = EmploymentType::all();
        $positions = JobPosition::all();
        $locations = Locations::all();
        $categories = JobCategory::all();
        $titles = JobTitle::all();
        $types = EmploymentType::all();
        $experience = Experience::all();
        $salary = Salary::all();
        $academics = AcademicQualification::all();
        $ages = Age::all();

        return view(
            'jobs.post',
            [
                'employmenType' => $employmenType,
                'positions' => $positions,
                'locations' => $locations,
                'titles' => $titles,
                'categories' => $categories,
                'types'=>$types,
                'experience'=>$experience,
                'salary'=>$salary,
                'academics'=>$academics,
                'ages'=>$ages

            ]
        );
    }

    public function jobFiles($file)
    {

        $path = Storage::disk('public')->put('jobAttachments', $file);
        return $path;

    }

    public function newPost(Request $request)
    {

        // dd($request);
        // $request->validate([
        //     'category_id'=>'required',
        //     'position_id'=>'required',
        //     'employmenType'=>'required',
        //     'fromDate'=>'required',
        //     'toDate'=>'required',
        //     'location_id'=>'required',
        //     'age'=>'required',
        //     'experience'=>'required',
        //     'salaryRange'=>'required',
        //     'qualifications'=>'required',
        //     'certificates'=>'required',
        //     'jobDescription'=>'required',
        //     'skills'=>'required',
        //     'benefits'=>'required',
        //     'notes'=>'required',
        //     'file_description'=>'required',

        // ]);

        try {

            DB::beginTransaction();
            $job = new Job;
            $job->category_id = $request->category_id;
            $job->title = $request->title_id;
            $job->posted_by = Auth::user()->id;
            $job->position_id = $request->position_id;
            $job->description = $request->jobDescription;
            $job->posted_on = $request->fromDate;
            $job->ending_on = $request->toDate;
            $job->requirements = $request->requirements;
            $job->age = $request->age;
            $job->location_id = $request->location_id;
            $job->experience = $request->experience;
            $job->salary_range = $request->salaryRange;
            $job->qualifications = $request->qualifications;
            $job->benefits = $request->benefits;
            $job->notes = $request->notes;
            $job->employment_type = $request->employmenType;
            $job->save();

            $skills = explode(',', $request->input('skills'));


            foreach ($skills as $skillName) {
                $skill = new JobSkill();
                $skill->job_id = $job->id;
                $skill->name = $skillName;
                $skill->save();
            }
            $certs = explode(',', $request->input('certificates'));


            foreach ($certs as $certName) {

                $certy = new JobCertificate;
                $certy->job_id = $job->id;
                $certy->name = $certName;
                $certy->save();
            }

            if ($request->hasFile('job_file')) {

                $attach = $request->file('job_file');
                $path = $this->jobFiles($attach);
                $jobfile = new JobAttachment;
                $jobfile->job_id = $job->id;
                $jobfile->path = $path;
                $jobfile->name = $request->file_description;
                $jobfile->save();

            }

            $history = new JobPostHistory;
            $history->job_id = $job->id;
            $history->user_id = Auth::user()->id;
            $history->from = $job->posted_on;
            $history->to = $job->ending_on;
            $history->save();

            DB::commit();
            return back()->with('success', 'your job has been posted successfully.');

        } catch (Exception $e) {

            DB::rollback();
            return back()->with('error', 'Failed to post your job vacancy' . $e);
        }




    }

    public function clientJobPreview($id)
    {

        $job = Job::find($id);
        return view('client.previewJob', ['job' => $job]);
    }

    public function userPreview()
    {

        $userId = Auth::user()->id;

        return view('client.profileSettings');
    }
}
