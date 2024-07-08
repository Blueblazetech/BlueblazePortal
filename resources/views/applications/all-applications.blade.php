@extends('layouts.master')
@section('title', 'all-applications')
@section('page-css')
<!--chartlist-->
<link rel="stylesheet" type="text/css" href="{{asset('assets\bower_components\chartist\css\chartist.css')}}">

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card page-header p-0">
            <div class="card-block front-icon-breadcrumb row align-items-end">
                <div class="breadcrumb-header col">
                    <div class="big-icon">
                        <i class="feather icon-user-plus"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item"><a href="#!">Admin</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">applications</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">all</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">

                <h4>Applications by Category</h4>
                <span>View job applications by category below</span>

            </div>
            <div class="card-block">
                <canvas id="myChart" width="400" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="card-header-left ">
                    <h4>Top 5 Applications Per Category</h4>
                    <span class="text-muted">Post Trends</span>
                </div>
            </div>
            <div class="card-block-big">
                <div id="monthly-graph" style="height: 370px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6">

    </div>
    <div class="col-xl-6 col-md-6 float-right">
        <div class="card feed-card ">
            <div class="card-header bg-warning mb-4">
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
    <div class="col-md-12">

        <div class="card z-depth-1">
            <div class="card-header bg-primary">
                <div class="card-title">
                    <h4>All Applications</h4>
                </div>
            </div>
            <div class="card-body">
                <livewire:applications.all-application/>
            </div>

        </div>
    </div>

@endsection

@section('page-js')
<script type="text/javascript" src="{{asset('assets\bower_components\chart.js\js\Chart.js')}}"></script>
  <!-- Custom js -->
  <script type="text/javascript" src="{{asset('assets\pages\chart\chartjs\chartjs-custom.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets\bower_components\chart.js\js\Chart.js')}}"></script>
  <!-- Custom js -->
  <script type="text/javascript" src="{{asset('assets\pages\chart\chartjs\chartjs-custom.js')}}"></script>
  <script src="{{asset('assets\js\pcoded.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets\pages\dashboard\crm-dashboard.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets\js\script.js')}}"></script>
@endsection
