<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('auth.login');


});



Auth::routes();

Route::middleware('auth','admin')->prefix('JobManagement')->group(function(){

    // Admin routes
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('ad-dashboard');
    Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('j-login');
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('ad-home');
    Route::get('/posted/jobs', [App\Http\Controllers\HomeController::class, 'postedJobs'])->name('ad-posted-jobs');
    Route::get('/post/jobs', [App\Http\Controllers\HomeController::class, 'postJobs'])->name('ad-post-jobs');
    Route::get('/pending/jobs', [App\Http\Controllers\HomeController::class, 'pendingJobs'])->name('ad-pending-jobs');
    Route::get('/applied/jobs', [App\Http\Controllers\HomeController::class, 'appliedJobs'])->name('ad-applied-jobs');
    Route::get('/expired/jobs', [App\Http\Controllers\HomeController::class, 'expiredJobs'])->name('ad-expired-jobs');
    Route::get('/approved/jobs', [App\Http\Controllers\HomeController::class, 'approvedJobs'])->name('ad-approved-jobs');
    Route::get('/active/jobs', [App\Http\Controllers\HomeController::class, 'activeJobs'])->name('ad-active-jobs');

    Route::get('/all/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-all-applications');
    Route::get('/approved/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-approved-applications');
    Route::get('/cancelled/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-cancelled-applications');
    Route::get('/expired/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-expired-applications');
    Route::get('/pending/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-pending-applications');
    Route::get('/rejected/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-rejected-applications');
    Route::get('/reversed/applications', [App\Http\Controllers\HomeController::class, 'allApplications'])->name('ad-reversed-applications');
    Route::get('/client', [App\Http\Controllers\HomeController::class, 'general'])->name('general-home');
    Route::get('/post/new', [App\Http\Controllers\HomeController::class, 'Post'])->name('ad-new-post');
    Route::post('/admin/post/form', [App\Http\Controllers\HomeController::class, 'newPost'])->name('ad-post-job');
    Route::get('/user/job/preview/{id}', [App\Http\Controllers\HomeController::class, 'clientJobPreview'])->name('c-job-preview');
    Route::get('/user/profile/preview', [App\Http\Controllers\HomeController::class, 'userPreview'])->name('c-profile-preview');
    Route::get('/preview/posted/{id}', [App\Http\Controllers\HomeController::class, 'prevPosted'])->name('a-preview-posted-job');

    Route::post('/user/apply-now', [App\Http\Controllers\HomeController::class, 'applyNow'])->name('apply-now');
    Route::post('/user/personal/detail', [App\Http\Controllers\HomeController::class, 'personalDetail'])->name('user-personal-detail');
    Route::post('/user/experience', [App\Http\Controllers\HomeController::class, 'userExperience'])->name('user-experience');
    Route::post('/user/education', [App\Http\Controllers\HomeController::class, 'userEducation'])->name('user-education');
    Route::post('/user/add/skill', [App\Http\Controllers\HomeController::class, 'userSkill'])->name('user-add-skills');
    Route::post('/user/add/certificate', [App\Http\Controllers\HomeController::class, 'userCertificate'])->name('user-add-certificate');
    Route::post('/user/add/socials', [App\Http\Controllers\HomeController::class, 'userSocial'])->name('user-add-socials');
    Route::post('/user/update/Account', [App\Http\Controllers\HomeController::class, 'updateUserAccount'])->name('user-update-account');











    // settings

    Route::post('/general/settings', [App\Http\Controllers\HomeController::class, 'generalSettings'])->name('s-general-settings');





});

Route::get('error', function(){

    return view('error.index');
});

Route::middleware('auth', 'user')->prefix('userJobs')->group(function(){

    // Route::get('/user/job/preview/{id}', [App\Http\Controllers\HomeController::class, 'clientJobPreview'])->name('c-job-preview');





});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('jobManagement')->group(function () {


    // Route::post('/new/job', [App\Http\Controllers\HomeController::class, 'jobPost'])->name('j-new-job-post');




});
