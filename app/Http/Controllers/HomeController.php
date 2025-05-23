<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Carbon\Carbon;
use App\Models\Age;
use App\Models\Job;
use App\Models\User;
use App\Models\Salary;
use App\Models\JobSkill;
use App\Models\JobTitle;
use App\Models\Education;
use App\Models\Locations;
use App\Models\UserSkill;
use App\Models\Experience;
use App\Models\PortalUser;
use App\Models\JobCategory;
use App\Models\JobPosition;
use App\Models\JobApplicant;
use Illuminate\Http\Request;
use App\Models\JobAttachment;
use App\Models\EmploymentType;
use App\Models\JobCertificate;
use App\Models\JobPostHistory;
use App\Models\UserAttachment;
use App\Models\UserExperience;
use App\Models\userCertificates;
use App\Models\UserSocialAccount;
use App\Models\UserAccountSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\AcademicQualification;
use Symfony\Component\Process\Process;
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
        $data = [
            'totalusers' => User::count(),
            'totaljobs' => Job::count(),
            'activejobs' => Job::where('status', 'active')->count(),
            'pendingjobs' => JobApplicant::where('status', 'pending')->count(),
            'rejectedjobs' => JobApplicant::where('status', 'rejected')->count(),
            'approvedjobs' => JobApplicant::where('status', 'approved')->count()

        ];

        $jobsPerMonth = Job::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $monthlyCounts = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthlyCounts[] = $jobsPerMonth[$i] ?? 0;
    }

        return view('admin.admin-home', compact('data', 'monthlyCounts'));
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

        $userId = Auth::id(); // Get the logged-in user ID
        // Fetch recommendations
        $recommendations = $this->getRecommendations($userId);
        return view('client.client-home', compact('recommendations'));
        //    return view('client.client-home');

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
                'types' => $types,
                'experience' => $experience,
                'salary' => $salary,
                'academics' => $academics,
                'ages' => $ages

            ]
        );
    }

    public function jobFiles($file)
    {

        $path = Storage::disk('public')->put('jobAttachments', $file);
        return $path;
    }

    public function userfiles($file)
    {

        $path = Storage::disk('public')->put('userAttachments', $file);
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
        $user = PortalUser::where('user_id', $userId)->first();

        return view('client.profileSettings', ['user' => $user]);
    }

public function applyNow(Request $request)
{
    $user = PortalUser::where('user_id', $request->userId)->first();

    if (!$user) {
        return back()->with('error', 'User profile not found, kindly update your user profile settings.');
    }

    try {
        // Check for duplicate application
        $dup = JobApplicant::where(function ($query) use ($request) {
            $query->where('user_id', Auth::user()->id)
                  ->where('job_id', $request->jobId);
        })->exists();

        if ($dup) {
            return back()->with('error', 'You have already applied for this job.');
        }

        DB::beginTransaction();

        // Create job application
        $app = new JobApplicant();
        $app->user_id = Auth::user()->id;
        $app->job_id = $request->jobId;
        $app->name = $user->name;
        $app->surname = $user->surname;
        $app->gender = $user->gender;
        $app->marital_status = $user->marital_status;
        $app->contact_1 = $user->contact_1;
        $app->contact_2 = $user->contact_2;
        $app->physical_address = $user->physical_address;
        $app->email_address = $user->email_address;
        $app->nationality = $user->nationality;
        $app->resume = $user->resume ? $user->resume->path : null;
        $app->video = $user->video ? $user->video->path : null;
        $app->portal_user_id = $user->id;
        $app->rank = $app->calculateScore();
        $app->status = 'Pending';
        $app->save();

        DB::commit();
        return back()->with('success', 'Your application has been submitted successfully.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Job Application Failed: ' . $e->getMessage());
    }
}


    public function personalDetail(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            $user = new PortalUser;
            $user->user_id = Auth::user()->id;
            $user->name = $request->firstname;
            $user->surname = $request->surname;
            $user->gender = $request->gender;
            $user->marital_status = $request->marital;
            $user->contact_1 = $request->phone1;
            $user->contact_2 = $request->phone2;
            $user->physical_address = $request->physical;
            $user->email_address = $request->mail;
            $user->nationality = $request->nationality;
            $user->title = $request->title;
            $user->date_of_birth = $request->dob;
            $user->save();

            if ($request->hasFile('nationalId')) {

                $natId = $request->file('nationalId');
                $path = $this->jobFiles($natId);
                $userId = new UserAttachment;
                $userId->user_id = Auth::user()->id;
                $userId->name = 'natoinal_id';
                $userId->path = $path;
                $userId->save();
            }

            if ($request->hasFile('usercv')) {

                $cv = $request->file('usercv');
                $path = $this->jobFiles($cv);
                $userCv = new UserAttachment;
                $userCv->user_id = Auth::user()->id;
                $userCv->name = 'user_cv';
                $userCv->path = $path;
                $userCv->save();
            }
            if ($request->hasFile('userv')) {

                $video = $request->file('userv');
                $path = $this->jobFiles($video);
                $userVideo = new UserAttachment;
                $userVideo->user_id = Auth::user()->id;
                $userVideo->name = 'user_video';
                $userVideo->path = $path;
                $userVideo->save();
            }


            DB::commit();
            return back()->with('success', 'Details updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'failed to update personal details' . $e);
        }
    }

    public function userExperience(Request $request)
    {

        // dd($request);

        try {

            DB::beginTransaction();
            $exp = new UserExperience;
            $exp->user_id = Auth::user()->portalUser->id;
            $exp->company = $request->company;
            $exp->position = $request->position;
            $exp->fromdate = $request->fromDate;
            $exp->toDate = $request->toDate;
            $exp->decription = $request->description;
            $exp->accumulated = $request->totalExp;
            $exp->save();
            DB::commit();
            return back()->with('success', 'Experience saved');
        } catch (Exception $e) {

            return back()->with('error', 'Failed to add experience records' . $e);
        }
    }

    public function userEducation(Request $request)
    {

        try {

            DB::beginTransaction();
            $aca = new Education;
            $aca->user_id = Auth::user()->portalUser->id;
            $aca->institution = $request->school;
            $aca->start_date = $request->fromDate;
            $aca->end_date = $request->toDate;
            $aca->level = $request->level;
            if ($request->hasFile('SchoolFile')) {

                $attach = $request->file('schoolFile');
                $path = $this->userFiles($attach);

                $file = new userAttachment;
                $file->user_id = Auth::user()->portalUser->id;
                $file->name = $request->getClientOriginalName();
                $file->path = $path;
                $file->status = 'active';
                $file->save();
            }

            DB::commit();

            return back()->with('success', 'Records added sucessfully');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Failed to Save the records' . $e);
        }
    }


    public function userSkill(Request $request)
    {


        try {

            DB::beginTransaction();
            $skills  = explode(',', $request->skills);
            foreach ($skills as $skill) {
                $sk = new UserSkill;
                $sk->user_id = Auth::user()->id;
                $sk->skill = $skill;
                $sk->save();
            }

            DB::commit();

            return back()->with('success', 'Skills successfully added to your profile');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Failed to add skills to your profile' . $e);
        }
    }

    public function userCertificate(Request $request)
    {

        // dd($request);
        try {

            DB::beginTransaction();
            $cert = new userCertificates;
            $cert->user_id = Auth::user()->portalUser->id;
            $cert->institution = $request->institution;
            $cert->program = $request->program;
            $cert->from_date = $request->fromDate;
            $cert->to_date = $request->toDate;
            if ($request->hasFile(key: 'certi_file')) {

                $attach = $request->file('certi_file');
                $path = $this->userFiles($attach);
                $cert->name = $attach->getClientOriginalname();
                $cert->path = $path;
                $cert->status = 'active';
                $cert->save();
            }
            DB::commit();
            return back()->with('success', 'certificates saved succefully');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error', 'failed to save certificate' . $e);
        }
    }

    public function updateUserAccount(Request $request)
    {
        try {
            DB::beginTransaction();

            $userId = Auth::id(); // Gets the authenticated user's ID

            // Find the existing user account or create a new one
            $acc = UserAccountSetting::firstOrCreate(
                ['user_id' => $userId],

                [
                    'country' => $request->country,
                   'city' => $request->city,
                    'province' => $request->province,
                    'job_preference' => $request->prefered,
                    'is_available' => $request->availability,
                    'is_public' => $request->visibility
                ]
            );
            $acc->country = $request->country;
            $acc->city = $request->city;
            $acc->province = $request->province;
            $acc->job_preference = $request->prefered;
            $acc->is_available = $request->availability;
            $acc->is_public = $request->visibility;
            $acc->save();

            DB::commit();
            return back()->with('success', 'Account details updated successfully');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error', 'Failed to update account details: ' . $e->getMessage());
        }
    }

    public function  userSocial(Request $request)
    {

        try {

            DB::beginTransaction();
            $soc = new UserSocialAccount;
            $soc->user_id = Auth::user()->portalUser->id;
            $soc->facebook = $request->facebook;
            $soc->linked_in = $request->linkedIn;
            $soc->twitter = $request->twitter;
            $soc->instagram = $request->instagram;
            $soc->save();

            DB::commit();
            return back()->with('success', 'Social accounts successfully updated');
        } catch (\Exception $e) {

            DB::rollback();
            return back()->with('error', 'Failed to update social media accounts');
        }
    }

    private function getRecommendations($userId)
    {
            // Fetch applied jobs
            $appliedJobs = \DB::table('job_applicants')
            ->join('jobs', 'job_applicants.job_id', '=', 'jobs.id')
            ->where('job_applicants.user_id', $userId)
            ->select('jobs.id', 'jobs.title', 'jobs.description', 'jobs.posted_on', 'jobs.ending_on', 'jobs.requirements') // add fields
            ->get()
            ->toArray();

            // Fetch all jobs
            $allJobs = \DB::table('jobs')
            ->select('id', 'title', 'description', 'posted_on', 'ending_on', 'requirements') // add fields
            ->get()
            ->toArray();


        // Prepare payload
        $payload = json_encode([
            'applied_jobs' => $appliedJobs,
            'all_jobs' => $allJobs,
        ]);

        // Prepare paths
        // $pythonBin = 'C:\\Users\\blueb\\AppData\\Local\\Programs\\Python\\Python310\\python.exe';
        $pythonBin = 'C:\\Users\\DELL\\AppData\\Local\\Microsoft\\WindowsApps\\python.exe';
        $scriptPath = base_path('scripts/recommend.py');

        // Set environment variables
        $env = [
            'SYSTEMROOT'=> getenv('SYSTEMROOT'),
            'PATH'=> getenv('PATH'),
        ];

        // Run the process
        $process = new Process([$pythonBin, $scriptPath], null, $env);
        $process->setInput($payload);
        $process->run();

        if (!$process->isSuccessful()) {
            dd('Error:', $process->getErrorOutput());
            return [];
        }

        return json_decode($process->getOutput(), true);
    }

    public function getPredictedJobTrends()
    {
        $jobs = DB::table('jobs')
            ->select(
                DB::raw('YEAR(posted_on) as year'),
                DB::raw('COUNT(*) as total_jobs')
            )
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $data = $jobs->map(function ($job) {
            return [
                'year' => (int) $job->year,
                'total_jobs' => (int) $job->total_jobs
            ];
        });

        // 2. Call Python Server (Flask API)
        $response = Http::post('http://127.0.0.1:5000/predict', $data->toArray());

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Could not fetch prediction'], 500);
        }
    }


}
