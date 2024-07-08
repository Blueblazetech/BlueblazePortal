@extends('layouts.master')
@section('title', 'posted-Jobs')
@section('page-css')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card page-header p-0">
            <div class="card-block front-icon-breadcrumb row align-items-end">
                <div class="breadcrumb-header col">
                    <div class="big-icon">
                        <i class="feather icon-briefcase"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item"><a href="#!">Admin</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">New</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">jobs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 float-right">
        <div class="card feed-card">
            <div class="card-header">
                <h5>Feeds</h5>
            </div>
            <div class="card-block">
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-bell bg-simple-c-blue feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 3 Unread Emails. <span class="text-muted f-right f-13">Just
                                Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">Received 10 new Applications Today<span class="text-muted f-right f-13">Just
                                Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 3 Jobs Expiring Job Vacancies soon. <span
                                class="text-muted f-right f-13">Just
                                Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 3 Overdue Applications. <span class="text-muted f-right f-13">Just
                                Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 2 Interviews soon. <span class="text-muted f-right f-13">Just
                                Now</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-10">

    </div>
    <div class="col-md-2">
        <button class="btn btn-outline-success m-b-10 btn-block" title="post job" data-toggle="modal"
            data-target ="#postJob">
            Post New Job
        </button>
    </div>
    <div class="col-md-12">

        <div class="card z-depth-1">
            <div class="card-header bg-primary">
                <div class="card-title">
                    <h4>New Job Posts Today</h4>
                </div>
            </div>
            <div class="card-body">
                <livewire:jobs.post-job />
            </div>

        </div>
    </div>

    {{-- Modals Section --}}

    <div class="modal fade" id="postJob">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">New Job Vacancy</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="container"></div>
                <div class="modal-body">
                    <form action="{{ route('j-new-job-post') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Job Category</label>
                                <select class="form-control" name="category" id="category" required>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Job Tittle</label>
                                <textarea class="form-control" name="job-title" id="job-title" placeholder="Example Manager..." required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter full job description here"
                                    required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Academic Qualifications</label>
                                <select class="form-control" name="academic" id="academic">
                                    <option> </option>
                                    <option>Bachelor's Degree</option>
                                    <option>Master's Degree</option>
                                    <option>Diploma Certificate</option>
                                    <option>O-Level</option>
                                    <option>A-Level</option>
                                    <option>N/A</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Certificates</label>
                                <textarea class="form-control" name="certificates" id="certificates"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Skills Required</label>
                                <textarea class="form-control" name="skills" id="skills"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Employment Type </label>
                                <select class="form-control" name="employmentType" id="employmentType">
                                    <option></option>
                                    <option>Permanent</option>
                                    <option>Temporary</option>
                                    <option>Contract</option>
                                    <option>Occassional</option>
                                    <option>Part Time</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Benefits</label>
                                <textarea class="form-control" name="Benefits" id="Benefits" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Additional Info</label>
                                <textarea class="form-control" name="info" id="info"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Location</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="location" id="location"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="checkbox"> <input type="checkbox" value="Remote">Remote</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Experience</label>
                                <select class="form-control" name="experience" id="experience">
                                    <option> </option>
                                    <option value="none"> > Year</option>
                                    <option>1-5yrs</option>
                                    <option>5-10yrs/option>
                                    <option>10-15yrs</option>
                                    <option>over 15yrs</option>
                                    <option>N/A</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Age Range</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="fromAge" id="fromAge"
                                            placeholder="From" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="To" id="toAge"
                                            placeholder="To" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Salary range</label>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="salaryFrom" id="salaryFrom"
                                            placeholder="From" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="salaryTo" id="salaryTo"
                                            placeholder="To" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Application Validity</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="from" id="from"
                                            placeholder="from" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="To" id="To"
                                            placeholder="To" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card m-t-20">

                                    <div class="card-header bg-primary">
                                        <div class="card-title">
                                            Upload Attachment
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="file" id="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-danger btn-md">Close</a>
                <a href="#" class="btn btn-primary btn-md">Post</a>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
@endsection
