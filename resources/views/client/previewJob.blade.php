@extends('layouts.master')

@section('page-css')
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card page-header p-0">
                    <div class="card-block front-icon-breadcrumb row align-items-end">
                        <div class="breadcrumb-header col">
                            <div class="big-icon">
                                <i class="feather icon-briefcase">Job Preview for : {{ $job->position_id }}</i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item"><a href="#!">user</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">job</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">preview</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline-warning z-depth-0 radius-5">
                            <div class="card-header bg-info">
                                <div class="card-title">
                                    <h5 style="color:white" class="text-center">Academic Requirements</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card b-l-info business-info">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h5 style="color: rgba(8, 144, 247, 0.859)" class="text-center"><b>
                                                            Achievement</b></h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <i class="feather icon-briefcase">
                                                    {{ $job->qualifications }}
                                                </i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        @foreach ($job->skills as $skill)
                                            <div class="card b-l-info business-info services">
                                                <div class="card-header">
                                                    <div class="service-header">
                                                        <a href="#">
                                                            <h5 class="card-header-text">{{ $skill->name }}</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card z-depth-0">
                            <div class="card-header">
                                <div class="card-title">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5><b> Posted On:</b></h5>
                                                <label class="label label-primary label-sm label-round">
                                                    <h6> {{ $job->from_date }}</h6>
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <h5><b> Expires On:</b></h5>
                                                <label class="label label-danger label-sm label-round">
                                                    <h6>{{ $job->from_date }}</h6>
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="mt-2 mb-1"><b>Job Status</b></h6>
                                            </div>
                                            <div class="col-md-6">
                                                @if ($job->status == 'Active')
                                                    <label class="label label-success label-sm mt-1 mb-1">
                                                        <h6>{{ $job->status }}</h6>
                                                    </label>
                                                @else
                                                    <label class="label label-danger label-sm mt-1 mb-1">
                                                        <h6>{{ $job->status }}</h6>
                                                    </label>
                                                @endif

                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        @if ($job->status == 'Expired')
                                            <button type="button"
                                                class="btn btn-hor btn-grd-success btn-lg btn-round float-right btn-block col-span-2"
                                                disabled>
                                                Apply Now
                                            </button>
                                        @else
                                            <button type="button"
                                                class="btn btn-hor btn-grd-success btn-lg btn-round float-right btn-block col-span-2">
                                                Apply Now
                                            </button>
                                        @endif

                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card b-l-info business-info">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h5 style="color: rgba(8, 144, 247, 0.859)" class="text-center">
                                                                <b>
                                                                    Job Category
                                                                </b>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <i class="feather icon-briefcase">
                                                            {{ $job->category_id }}
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card b-l-info business-info">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h5 style="color: rgba(8, 144, 247, 0.859)" class="text-center">
                                                                <b>
                                                                    Job Title</b>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <i class="feather icon-briefcase">
                                                            {{ $job->position_id }}
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card b-l-info business-info">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h5 style="color: rgba(8, 144, 247, 0.859)" class="text-center">
                                                                <b>
                                                                    Employment Type</b>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <i class="feather icon-briefcase">
                                                            {{ $job->employment_type }}
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card b-l-info business-info">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h5 style="color: rgba(8, 144, 247, 0.859)" class="text-center">
                                                                <b>
                                                                    Salary Range</b>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <i class="feather icon-briefcase">
                                                            {{ $job->salary_range }}
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card z-depth-0">
                            <div class="card-header">
                                <div class="card-title text-center">
                                    <b>Job Description</b>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 m-2">
                                    <p>
                                        {{ $job->description }}
                                    </p>
                                    <hr>

                                </div>

                                <div class="col-md-12 m-2">
                                    <b class="text-center">Experience</b>
                                    <p>
                                        {{ $job->experience }}
                                    </p>
                                    <hr>

                                </div>




                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card z-depth-0">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <b>Benefits</b>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{$job->benefits}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card z-depth-1">
                                        <div class="card-header">
                                            <div class="card-title">
                                               <b>Location:</b>  {{ $job->location_id }}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5>Map</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Related Recent Job Posts</h5>
                        {{-- <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5>Related Recent Job Posts</h5>
                                </div>
                            </div>
                            <div class="card-body">

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-js')
@endsection
