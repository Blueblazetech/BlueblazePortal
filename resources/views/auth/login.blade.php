@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('assets/images/login.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh; /* Set the height of the body to fill the viewport */
    }
    .card {
        margin-top: 100px; /* Increase the distance from the top bar */
        opacity: 0.9; /* Introduce opacity */
        border: 3px solid rgba(22, 95, 221, 0.726); /* Add an RGB border with a fading blue color */
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
<div class="container-fluid">
    <div class="row justify-content-center mt-30">
        <div class="col-md-5 mt-30">
            <div class="card mt-30">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-md">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: white">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
