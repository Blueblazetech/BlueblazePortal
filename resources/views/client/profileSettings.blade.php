@extends('layouts.master')

@section('page-css')
    <style>
        .customForm {
            border: 1px solid;
            border-color: rgba(7, 40, 202, 0.903);
            border-radius: 1%;
            margin-left: 2%;
            padding: 1%;
        }

        .customAccount {
            border: 1px solid;
            border-color: rgb(7, 120, 233);
            border-radius: 1%;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card page-header p-0">
                    <div class="card-block front-icon-breadcrumb row align-items-end">
                        <div class="breadcrumb-header col">
                            <div class="big-icon">
                                <i class="feather icon-user">{{ Auth::user()->name }}</i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item"><a href="#!">user</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">profile</a>
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
                    <div class="col-md-9">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="libraries\assets\images\avatar-4.jpg" class="img-radius"
                                                alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                                        <p>Web Designer</p>
                                        <i class="feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12 float-right">
                                                <button type="button"
                                                    class="btn btn-md btn-outline-primary float-right mb-1 border-r-3 btn-round ">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400">

                                                    {{ $user->email_address ?? 'null' }}

                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400">{{ $user->contact_1 ?? 'null' }}</h6>
                                            </div>
                                        </div>
                                        {{-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6> --}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Title</p>
                                                <h6 class="text-muted f-w-400">{{ $user->title ?? 'null' }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender</p>
                                                <h6 class="text-muted f-w-400">{{ $user->gender ?? 'null' }}</h6>
                                            </div>
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="facebook"><i
                                                        class="feather icon-facebook facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="twitter"><i
                                                        class="feather icon-twitter twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="instagram"><i
                                                        class="feather icon-instagram instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-grd-primary">
                                <div class="card-title">
                                    Profile Completeness
                                </div>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-c-lite-green">
                                <div class="card-title">
                                    <h4 style="color: white">My Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills align-center">
                                    <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab"><i
                                                class="feather icon-users mr-1"></i> Personal
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#experience" data-toggle="tab"><i
                                                class="feather icon-user-check mr-1"></i>Experience
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#academic" data-toggle="tab"><i
                                                class="feather icon-book mr-1"></i>Academic
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#skills" data-toggle="tab"><i
                                                class="feather icon-list mr-1"></i>Skills
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="#certificates" data-toggle="tab"><i
                                                class="feather icon-bookmark mr-1"></i>Cartificates
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#account" data-toggle="tab">
                                            <i class="feather icon-sliders mr-1"></i>
                                            Account

                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#social" data-toggle="tab">
                                            <i class="feather icon-globe mr-1"></i>
                                            Social
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="active tab-pane" id="personal">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-12" id="customDiv">
                                                        <form class=" form customForm"
                                                            action="{{ route('user-personal-detail') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="firstname">
                                                                                    Firstname
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="firstname" value="" required
                                                                                    name="firstname">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Surname
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="surname" value="" required
                                                                                    name="surname">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Marital Status
                                                                                </label>
                                                                                <select class="form-control"
                                                                                    id="marital" value="" required
                                                                                    name="marital">
                                                                                    <option value="">
                                                                                    <option value="single">Single</option>
                                                                                    <option value="married">Married
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Gender
                                                                                </label>
                                                                                <select class="form-control"
                                                                                    id="gender" value="" required
                                                                                    name="gender">
                                                                                    <option value="">
                                                                                    <option value="male">Male</option>
                                                                                    <option value="female">Female</option>
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Title
                                                                                </label>
                                                                                <select class="form-control"
                                                                                    id="title" value="" required
                                                                                    name="title">
                                                                                    <option value="">
                                                                                    <option value="mr">Mr</option>
                                                                                    <option value="mrs">Mrs</option>
                                                                                    <option value="miss">Miss</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Date Of Birth
                                                                                </label>
                                                                                <input type="date" class="form-control"
                                                                                    id="dob" value="" required
                                                                                    name="dob">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="natinality">
                                                                                    Date Of Birth
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nationality" value=""
                                                                                    required name="nationality">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Contact Number
                                                                                </label>
                                                                                <input type="number" class="form-control"
                                                                                    id="phone1" value="" required
                                                                                    name="phone1">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Other Number
                                                                                </label>
                                                                                <input type="number" class="form-control"
                                                                                    id="phone2" value="" required
                                                                                    name="phone2">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Email Address
                                                                                </label>
                                                                                <input type="email" class="form-control"
                                                                                    id="mail" value="" required
                                                                                    name="mail">
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Physical Adress
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="physical" value="" required
                                                                                    name="physical">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Postal Address
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="postal" value="" required
                                                                                    name="postal">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="surname">
                                                                                    Website(<i
                                                                                        style="color: green">optional</i>)
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="website" value="" required
                                                                                    name="website">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="card">
                                                                                <div class="card-header bg-warning">
                                                                                    <div class="card-title">
                                                                                        National ID
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <input class="form-control"
                                                                                        type="file" id="nationalId"
                                                                                        name="nationalId">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="card">
                                                                                <div class="card-header bg-warning">
                                                                                    <div class="card-title">
                                                                                        Upload Cv
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <input class="form-control"
                                                                                        type="file" id="usercv"
                                                                                        name="usercv">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="card">
                                                                                <div class="card-header bg-success">
                                                                                    <div class="card-title">
                                                                                        Upload Video(<i>optional</i>)
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <input class="form-control"
                                                                                        type="file" id="userv"
                                                                                        name="userv">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-grd-danger btn-round"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-grd-primary btn-round">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="experience">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        Employment History
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button"
                                                                class="btn btn-grd-primary float-right btn-round"
                                                                data-toggle="modal" data-target="#empDetails">
                                                                <i class="feather icon-briefcase"></i> Add Details
                                                            </button>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                                <div class="tab-pane" id="academic">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">

                                                </div>
                                                <div class="card-body">

                                                    <button type="button"
                                                        class="btn btn-grd-primary float-right btn-round"
                                                        data-toggle="modal" data-target="#editAcademic">
                                                        <i class="feather icon-briefcase"></i> Add Details
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="skills">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">

                                                </div>
                                                <div class="card-body">

                                                    <button type="button"
                                                        class="btn btn-grd-primary float-right btn-round"
                                                        data-toggle="modal" data-target="#editSkills">
                                                        <i class="feather icon-briefcase"></i> Add Skills
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="certificates">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">

                                                </div>
                                                <div class="card-body">

                                                    <button type="button"
                                                        class="btn btn-grd-primary float-right btn-round"
                                                        data-toggle="modal" data-target="#addCerti">
                                                        <i class="feather icon-briefcase"></i> Add Certificates
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="account">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">

                                                    <div class="card-title">

                                                    </div>

                                                </div>
                                                <div class="card-body">
                                                    <div class="row" class="customAccount">
                                                        <div class="col-md-4">
                                                            <label for="country">
                                                                Country
                                                            </label>
                                                            <select class="form-control" name="countries" id="countries">
                                                                <option value="zimbabwe">Zimbabwe</option>
                                                                <option value="south_africa">South Africa</option>
                                                                <option value="mozambique">Mozambique</option>
                                                                <option value="malawi">Malawi</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="cty">
                                                                City
                                                            </label>
                                                            <select class="form-control" name="city" id="city">
                                                                <option value="harare">Harare</option>
                                                                <option value="mutare">Mutare</option>
                                                                <option value="masvingo">Masvingo</option>
                                                                <option value="gweru">Gweru East</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="cty">
                                                                Province
                                                            </label>
                                                            <select class="form-control" name="city" id="city">
                                                                <option value="harare">Harare</option>
                                                                <option value="manicaland">Manicaland</option>
                                                                <option value="mash_west">Mashonaland West</option>
                                                                <option value="mash_east">Mashonaland East</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <label for="pref">Choose Prefered Job Titles</label>
                                                    <textarea type="text" name="prefered" id="prefered" class="form-control"
                                                        placeholder="please choose your job options here">
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        Profile Status
                                                    </div>

                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>Employment Vacancies</h5>
                                                                <div class="form-group">
                                                                    <label for="avble">Available</label>
                                                                    <input type="radio" id="available"
                                                                        name="available">
                                                                    <label for="unble">Unavailable</label>
                                                                    <input type="radio" id="unavailable"
                                                                        name="unavailable">
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h5>Account Privacy</h5>
                                                            <div class="form-group">
                                                                <label for="avble">Visible</label>
                                                                <input type="radio" id="visible" name="visible">
                                                                <label for="unble">Private</label>
                                                                <input type="radio" id="private" name="private">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">

                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="col-md-6">
                                                                <label for="passd">New Password</label>
                                                                <input type="password" id="passrd" name="passwrd"
                                                                    class="form-control bg-info">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="passd">Confirm Password</label>
                                                                <input type="password" id="confirm" name="confirm"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h5 style="color: red"> Delete /</h5>
                                                        <h5 style="color: green">Deactivate Account</h5>
                                                    </div>

                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger btn-md btn-round">Deactivate</button>
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger btn-md float-right btn-round">Delete
                                                                                Account</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="rsn">
                                                                        Reason
                                                                    </label>
                                                                    <textarea class="form-control" name="reason" id="reason"
                                                                        placeholder="reason for account deletion or deactivation">
                                                                </textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="social">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="" method="" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label">Facebook</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="feather icon-facebook"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="https//facebook.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label">LinkedIn</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="feather icon-link"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="https//linkedin.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label">Instagram</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="feather icon-instagram"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="https//instagram.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label">Twitter</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="feather icon-twitter"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="https//twitter.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-round float-right mb-2">Update</button>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
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
    <div id="empDetails" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" class="text-center">Previous Employment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('user-experience') }}" method="POST" name="prevHistory"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fromDate">From</label>
                                        <input type="date" id="fromDate" name="fromDate" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="toDate">To</label>
                                        <input type="date" id="toDate" name="toDate" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center mt-5">
                                Reference:
                                <hr>
                            </div>

                            <div class="col-md-6">
                                <label for="refname">Name</label>
                                <input type="text" id="refName" name="refName" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="refphone">Position</label>
                                <input type="text" id="refPos" name="refPos" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="refname">Phone</label>
                                <input type="text" id="refPhone" name="refPhone" class="form-control">
                            </div>

                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Further Job Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grd-danger btn-round"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-grd-success btn-round">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modals section --}}
    <div id="editAcademic" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title ">Education History</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user-education') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="schl">
                                                School / Institution
                                            </label>
                                            <input type="text" class="form-control" id="school" name="school">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="schl">
                                                        From
                                                    </label>
                                                    <input type="date" class="form-control" id="fromDate"
                                                        name="fromDate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="schl">
                                                        To
                                                    </label>
                                                    <input type="date" class="form-control" id="toDate"
                                                        name="toDate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label for="level">Level</label>
                                        <select class="form-control" id="level" name="level">
                                            <option value="N/A">N/A</option>
                                            <option value="Graden 7">Grade 7</option>
                                            <option value="O-Level">O-Level</option>
                                            <option value="A-Level">A-Level</option>
                                            <option value="College">College</option>
                                            <option value="University">University</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="card">
                                            <div class="card-header bg-c-lite-green">
                                                <div class="card-title">
                                                    <h5 style="color: white">Attach Certificates here!</h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <input type="file" class="form-control" id="schoolFile"
                                                    name="schoolFile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grd-danger btn-round"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-grd-primary btn-round">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div id="editSkills" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="modal-title">Add Skills</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user-add-skills') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sklz">
                                                My Skills(<i>'separate your skills with a comma'</i>)
                                            </label>
                                            <textarea type="text" class="form-control" id="skills" name="skills" placeholder="enter your skills here">
                                                </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="modal-footer">
                    <button type="button" class="btn btn-grd-danger btn-round" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd-primary btn-round">Submit</button>
                </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <div id="addCerti" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">My Certificates</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user-add-certificate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insti">Institution/School</label>
                                            <input class="form-control" type="text" id="institution"
                                                name="institution">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insti">Program/Course</label>
                                            <input class="form-control" type="text" id="program" name="program">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fromDate">From</label>
                                            <input type="date" class="form-control" id="fromDate" name="fromDate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="toDate">To</label>
                                            <input type="date" class="form-control" id="toDate" name="toDate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <div class="card-title">

                                                    </div>

                                                </div>
                                                <div class="card-body">
                                                    <label for="fromDate">Attach Results here!</label>
                                                    <input type="file" class="form-control" id="certi_file"
                                                        name="certi_file">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grd-danger btn-round" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grd-primary btn-round">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('page-js')
@endsection
