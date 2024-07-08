@extends('layouts.master')

@section('page-css')
    <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\j-pro\css\demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\j-pro\css\font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\j-pro\css\j-pro-modern.css') }}">

    <style>
        #custom-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }


        label {
            font-weight: bold;
        }


        .form-control {
            border-radius: 8px;
        }
    </style>

    <style>
        /* Styling for form dots */
        .form-dots {
            position: relative;
            display: inline-block;
            vertical-align: top;
            margin-right: 20px;
        }

        .form-dot {
            width: 12px;
            height: 12px;
            background-color: #ccc;
            border-radius: 50%;
            display: inline-block;
            margin-bottom: 20px;
        }

        .form-dot.active {
            background-color: #007bff;
            /* Active dot color */
        }

        /* Styling for form line */
        .form-line {
            position: absolute;
            top: 0;
            left: 50%;
            width: 2px;
            height: 100%;
            background-color: #ccc;
            transform: translateX(-50%);
            z-index: -1;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card page-header p-0">
                        <div class="card-block front-icon-breadcrumb row align-items-end">
                            <div class="breadcrumb-header col">
                                <div class="big-icon">
                                    <i class="feather icon-edit"></i>
                                </div>
                            </div>
                            <div class="col">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item"><a href="#!">Admin</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">create</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">post</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                </div>

            </div>

        </div>


        <!-- Job application card start -->
        <div class="col-md-10">
            <form class="form" name="application" id="job_application" method="POST" action="{{ route('ad-post-job') }}"
                enctype="multipart/form-data">

                @csrf
                <div class="card" id="custom-card">
                    <div class="card-header bg-info">
                        <div class="card-title text-center" style="color: white">
                            <h4>Create New Job Post</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="category">
                                    <h4>Category</h4>
                                </label>
                                <select class="form-control" id="category_id" name ="category_id">
                                    <option value="" selected> Select Job Category</option>
                                   @foreach($categories as $category)
                                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="title">
                                    <h4>Title</h4>
                                </label>
                                <select class="form-control" id="title" name="title_id">
                                    <option value="" selected> Select Job title</option>
                                    @foreach($titles as $title)
                                    <option value="{{$title->id}}">
                                        {{$title->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6 float-right">
                                        <label for="title">
                                            <h4>Position</h4>
                                        </label>
                                        <select class="form-control" id="position_id" name="position_id">
                                            <option value="" selected> Select Job Position</option>
                                            @foreach($positions as $position)
                                            <option value="{{$position->id}}">
                                                {{$position->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="type">
                                    <h4>Job Type</h4>
                                </label>
                                <select class="form-control" id="type" name= "employmenType">
                                    <option value="" selected>Select employment Type</option>
                                   @foreach($employmenType as $type)
                                   <option value="{{$type->id}}">
                                    {{$type->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fromDate">
                                            <h4>From</h4>
                                        </label>
                                        <input type="date" class="form-control bg-primary" name="fromDate"
                                            id="fromDate">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="toDate">
                                            <h4>To</h4>
                                        </label>
                                        <input type="date" class="form-control bg-warning" name="toDate" id="toDate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="location">
                                    <h4>Job Location</h4>
                                </label>
                                <select class="form-control" id="location_id" name="location_id">
                                    <option value="" selected>Select Job Location</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">
                                     {{$location->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="age">
                                    <h4>Age</h4>
                                </label>
                                <select class="form-control" id="age" name="age">
                                    <option value="" selected>Select Age Range</option>
                                    @foreach($ages as $age)
                                    <option value="{{ $age->id }}">{{ $age->range }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="experience">
                                    <h4>Experience</h4>
                                </label>
                                <select class="form-control" id="experience" name ="experience">
                                    <option value="" selected>Select Job Experience Required</option>
                                    @foreach($experience as $exp)

                                    <option value="{{ $exp->id }}">{{ $exp->experience }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="salary">
                                    <h4>Salary</h4>
                                </label>
                                <select class="form-control bg-success" id="salary" name="salaryRange">
                                    <option value="" selected>Select salary Range</option>
                                  @foreach($salary as $slry)
                                  <option value="{{ $slry->id }}">{{ $slry->range }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="academic_qualification">
                                    <h4>Academic Qualifications</h4>
                                </label>
                                <select class="form-control" id="qualifications" name="qualifications">
                                    <option value="" selected>Select Academic Qualifications</option>
                                    @foreach($academics as $aca)
                                    <option value="$aca->id">{{ $aca->qualification }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <label for="Certificates">
                                    <h4>Certifications</h4>
                                </label>
                                <div class="row card-block z-depth-1 card-outline border-r-3 ml-2 mr-2 mb-2">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="dynamic-row">
                                            <h6 class="sub-title">List required Certificates here</h6>
                                            <div class="dynamic-list-three effeckt-list-wrap">
                                                <ul class="effeckt-list m-b-0" id="Certificates-list"
                                                    data-effeckt-type="fall-in">
                                                    <!-- List starts empty -->
                                                </ul>
                                                <input type="text" id="new-Certificates-input" class="form-control"
                                                    placeholder="Type required Certificates here..." name="certificates">
                                                <button type="button"
                                                    class="btn btn-round btn-hor btn-grd-primary waves-effect waves-light m-r-15 m-l-15 add-Certificates m-4">
                                                    Add
                                                </button>
                                                <button type="button"
                                                    class="btn btn-round btn-hor btn-grd-danger waves-effect waves-light remove-Certificates float-right m-4">
                                                    Remove Selected
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="skills">
                                    <h4>Skills</h4>
                                </label>
                                <div class="row card-block z-depth-1 card-outline border-radius-3 ml-2 mr-2 mb-2">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="dynamic-row">
                                            <h6 class="sub-title">Add or remove skills required below</h6>
                                            <div class="dynamic-list-three effeckt-list-wrap">
                                                <ul class="effeckt-list m-b-0" id="skills-list"
                                                    data-effeckt-type="fall-in">
                                                    <!-- List starts empty -->
                                                </ul>
                                                <input type="text" id="new-skill-input" class="form-control"
                                                    placeholder="Type new skill here..." name="skills">
                                                <button type="button"
                                                    class="btn btn-round btn-hor btn-grd-primary waves-effect waves-light m-r-15 m-l-15 add-skill m-4">
                                                    Add
                                                </button>
                                                <button type="button"
                                                    class="btn btn-round btn-hor btn-grd-danger waves-effect waves-light remove-skill float-right m-4">
                                                    Remove Selected
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="description">
                                    <h4>Job Description</h4>
                                </label>
                                <textarea class="form-control" id="description" name="jobDescription" placeholder="type job description">
                            </textarea>
                            </div>


                            <div class="col-md-6">
                                <label for="benefits">
                                    <h4>Benefits</h4>
                                </label>
                                <textarea class="form-control" id="benefits" name="benefits" placeholder="type job benefits required">
                            </textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="notes m-t-4">
                                    <h4>Special Notes</h4> <i style="color: red">(optional)</i>
                                </label>
                                <textarea class="form-control" id="notes" name="notes" placeholder="type any special notes about the job">
                            </textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="description">
                                    <h4>Other Requirements</h4>
                                    <i style="color: red">(optional)</i>
                                </label>
                                <textarea class="form-control" id="requirements" name="requirements" placeholder="type other job requirements">
                            </textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="card m-t-10 z-depth-2">
                                    <div class="card-header bg-info">
                                        <div class="card-title">
                                            <h5 style="color: white">Upload File</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file" name="job_file" id="job_file mb-2">
                                            </div>

                                            <div class="col-md-12">
                                                <input type="text" name="file_description" id="file_description"
                                                    placeholder="enter file description here" class="form-control m-t-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-grd-danger btn-round btn-lg">Reset Form</button>
                        <button type="submit" class="btn btn-grd-primary btn-round float-right btn-lg">Submit
                            Job</button>
                    </div>
            </form>
        </div>
        {{-- <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="form-dots">
                        <div class="form-dot active"></div>
                        <div class="form-dot"></div>
                        <div class="form-dot"></div>
                        <div class="form-dot"></div>
                        <div class="form-dot"></div>
                        <!-- Add more dots as needed -->
                    </div>
                    <div class="form-line"></div>
                </div>
            </div>
    </div> --}}


    </div>
@endsection

@section('page-js')
    <script type="text/javascript" src="libraries\assets\pages\j-pro\js\jquery.ui.min.js"></script>
    <script type="text/javascript" src="libraries\assets\pages\j-pro\js\jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="libraries\assets\pages\j-pro\js\jquery.j-pro.js"></script>
    <script type="text/javascript" src="libraries\assets\pages\j-pro\js\custom\form-job.js"></script>

    <script>
        $(document).ready(function() {
            $('.add-Certificates').click(function() {
                var newCerty = $('#new-Certificates-input').val().trim();
                if (newCerty !== '') {
                    $('#Certificates-list').append('<li><h6>' + newCerty + '</h6></li>');
                    $('#new-Certificates-input').val(''); // Clear input field after adding
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.add-skill').click(function() {
                var newSkill = $('#new-skill-input').val().trim();
                if (newSkill !== '') {
                    $('#skills-list').append('<li><h6>' + newSkill + '</h6></li>');
                    $('#new-skill-input').val(''); // Clear input field after adding
                }
            });
        });
    </script>
@endsection
