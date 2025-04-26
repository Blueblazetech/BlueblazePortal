@extends('layouts.master')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\bower_components\chartist\css\chartist.css') }}">
    <style>
        .apply {

            float: right,
                color: aqua,
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="feather icon-pie-chart bg-c-blue card1-icon"></i>
                        <span class="text-c-blue f-w-600">Jobs Available</span>
                        <h4>49/50GB</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-blue f-16 feather icon-alert-triangle m-r-10"></i>Get more space
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="feather icon-home bg-c-pink card1-icon"></i>
                        <span class="text-c-pink f-w-600">Expired Jobs</span>
                        <h4>$23,589</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-pink f-16 feather icon-calendar m-r-10"></i>Last 24 hours
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="feather icon-alert-triangle bg-c-green card1-icon"></i>
                        <span class="text-c-green f-w-600">Approved Applications</span>
                        <h4>45</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-green f-16 feather icon-tag m-r-10"></i>Tracked at microsoft
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="feather icon-twitter bg-c-yellow card1-icon"></i>
                        <span class="text-c-yellow f-w-600">Pending Applications</span>
                        <h4>+562</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-yellow f-16 feather icon-watch m-r-10"></i>Just update
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">

                        <h4>Popular Job Locations</h4>
                        <span>View job posts by location below</span>

                    </div>
                    <div class="card-block">
                        <canvas id="myChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 apply">
                                <div class="row">
                                    <div class="col-md-12 apply">
                                        <a href="{{ route('ad-posted-jobs') }}"
                                            class="btn btn-outline-primary btn-round btn-lg btn-block p-1 mb-2">Browse
                                            Available Jobs</a>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6 apply float-right">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('ad-posted-jobs') }}"
                                            class="btn btn-outline-success btn-round btn-lg btn-block p-1 mb-2">Apply
                                            A Job</a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('c-profile-preview') }}"
                                            class="btn btn-outline-primary btn-round btn-lg btn-block p-1 mb-2"
                                            data-id={{ Auth::user()->id }}<i class="feather icon-user"></i> Profile</a>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="card card-outline-primary mt-5">
                            <div class="card-header bg-info">
                                <div class="card-title">
                                    <h4 style="color: white" class="text-center">
                                        <i class="feather icon-briefcase"></i> Recommended Jobs
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="recommendations mt-4">
                                    @if(count($recommendations) > 0)
                                        <ul>
                                            @foreach($recommendations as $job)
                                                <li>
                                                    <strong>{{ $job['title'] }}</strong> — Match Score: {{ number_format($job['score'] * 100, 2) }}%
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No recommendations available at the moment.</p>
                                    @endif
                                </div>

                                {{-- <div class="table-responsive"> <!-- ✅ Wrap table here -->
                                    <livewire:client.posted-job />
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="card z-dept-1">
                    <div class="card-header bg-primary">
                        <div class="card-title">
                            <h4>Recent Activity</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 f-left">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5>Job Posts</h5>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <livewire:client.posted-job />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 f-right">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5>Job Applications</h5>
                                    </div>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card table-card">
                    <div class="card-header bg-warning">
                        <h5>Top Recruiting Companies this month</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-refresh reload-card"></i></li>
                                <li><i class="fa fa-trash close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Subject</th>
                                        <th>Department</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="label label-success">open</label></td>
                                        <td>Website down for one week</td>
                                        <td>Support</td>
                                        <td>Today 2:00</td>
                                    </tr>
                                    <tr>
                                        <td><label class="label label-primary">progress</label></td>
                                        <td>Loosing control on server</td>
                                        <td>Support</td>
                                        <td>Yesterday</td>
                                    </tr>
                                    <tr>
                                        <td><label class="label label-danger">closed</label></td>
                                        <td>Authorizations keys</td>
                                        <td>Support</td>
                                        <td>27, Aug</td>
                                    </tr>
                                    <tr>
                                        <td><label class="label label-success">open</label></td>
                                        <td>Restoring default settings</td>
                                        <td>Support</td>
                                        <td>Today 9:00</td>
                                    </tr>
                                    <tr>
                                        <td><label class="label label-primary">progress</label></td>
                                        <td>Loosing control on server</td>
                                        <td>Support</td>
                                        <td>Yesterday</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="text-right m-r-20">
                                <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 float-right">
                <div class="card feed-card">
                    <div class="card-header">
                        <h5>Action Pannel</h5>
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
                                <h6 class="m-b-5">Received 10 new Applications Today<span
                                        class="text-muted f-right f-13">Just
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
                                <h6 class="m-b-5">You have 3 Overdue Applications. <span
                                        class="text-muted f-right f-13">Just
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
        </div>
    </div>
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('assets\bower_components\chart.js\js\Chart.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('assets\pages\chart\chartjs\chartjs-custom.js') }}"></script>
    <script src="{{ asset('assets\js\pcoded.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets\pages\dashboard\crm-dashboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets\js\script.js') }}"></script>
@endsection
