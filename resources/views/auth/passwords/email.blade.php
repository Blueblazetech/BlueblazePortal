@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('assets/images/email.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh; /* Set the height of the body to fill the viewport */
    }
    .card {
        margin-top: 100px; /* Increase the distance from the top bar */
        opacity: 0.9; /* Introduce opacity */
        border: 3px solid rgba(22, 95, 221, 0.726);  /* Add an RGB border with a fading blue color */
        border-radius: 20px;
        animation: borderAnimation 5s infinite alternate;
        background-color: rgba(69, 67, 67, 0.9);
        color: white;

        @keyframes borderAnimation {
        0% {
            border-color: rgba(0, 0, 255, 0.5); /* Start with blue color */
        }
        100% {
            border-color: rgba(0, 0, 255, 0.8); /* End with a slightly darker blue color */
        }
    }

        /* Optional: Add border radius for a rounded look */
    }
</style>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
