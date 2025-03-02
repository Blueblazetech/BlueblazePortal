@extends('layouts.master')
{{-- @section('title', 'Admin Dashboard')
@endsection --}}
@section('page-css')
    <!--chartlist-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\bower_components\chartist\css\chartist.css') }}">
@endsection

@section('content')
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-blue">
            <div class="card-block">
                <i class="feather icon-user bg-simple-c-blue card1-icon"></i>
                <h4>652</h4>
                <p>Total Users</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-pink">
            <div class="card-block">
                <i class="feather icon-home bg-simple-c-pink card1-icon"></i>
                <h4>652</h4>
                <p>Total Job Posts</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-green">
            <div class="card-block">
                <i class="feather icon-alert-triangle bg-simple-c-green card1-icon"></i>
                <h4>652</h4>
                <p>Active Jobs</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-yellow">
            <div class="card-block">
                <i class="feather icon-twitter bg-simple-c-yellow card1-icon"></i>
                <h4>652</h4>
                <p>Pending Applications</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-10">

    </div>
    <div class="col-md-2">
        <a href="{{ route('ad-new-post') }}"
            class="btn btn-outline-primary btn-round btn-lg btn-grd btn-block p-1 mb-2">Post A Job</a>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">

                <h4>Job Posts Categories</h4>
                <span>View job posts by category below</span>

            </div>
            <div class="card-block">
                <canvas id="myChart" width="400" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-header-left ">
                    <h4>Monthly View</h4>
                    <span class="text-muted">Post Trends</span>
                </div>
            </div>
            <div class="card-block-big">
                <div id="monthly-graph" style="height: 370px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card z-dept-1">
            <div class="card-header bg-primary">
                <div class="card-title">
                    <h4>Recent Activities</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-6 f-left">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Posts</h5>
                            </div>
                        </div>
                        <div class="card-body">

                            <h1>Posted Jobs</h1>

                            <livewire:jobs.posted-job />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 f-right">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Applications</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1>Recent Applications</h1>
                            <div class="row table-responsive">
                                <livewire:applications.all-application />
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
