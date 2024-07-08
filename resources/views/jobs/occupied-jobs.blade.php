@extends('layouts.master')
@section('title','posted-Jobs')
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
                            <li class="breadcrumb-item"><a href="#!">occupied</a>
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
                            <h6 class="m-b-5">Received 10 new Applications Today<span class="text-muted f-right f-13">Just Now</span></h6>
                        </div>
                    </div>
                    <div class="row m-b-30">
                        <div class="col-auto p-r-0">
                            <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                        </div>
                        <div class="col">
                            <h6 class="m-b-5">You have 3 Jobs Expiring Job Vacancies soon. <span class="text-muted f-right f-13">Just
                                    Now</span></h6>
                        </div>
                    </div>
                    <div class="row m-b-30">
                        <div class="col-auto p-r-0">
                            <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                        </div>
                        <div class="col">
                            <h6 class="m-b-5">You have 3 Overdue Applications. <span class="text-muted f-right f-13">Just Now</span></h6>
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
                <h4>Occupied Job Posts</h4>
            </div>
        </div>
        <div class="card-body">
            <livewire:jobs.occupied-job />
        </div>

    </div>
</div>

@endsection

@section('page-js')
@endsection
