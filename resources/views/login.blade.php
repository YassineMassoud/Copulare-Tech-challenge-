@extends('auth-layouts.app')
@section('title','Login')
@section('content')
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="auth-form-wrapper px-4 py-5">

                                    <a href="{{ url("/") }}" class="noble-ui-logo d-block mb-2">
{{--                                        <h1>Doctor's Letter</h1>--}}
                                        <img src="{{URL::asset('assets/images/logo.png')}}" alt="Logo" height="40">
                                    </a>
                                    <h5 class="text-muted fw-normal mb-4">Log in to your Account Here.</h5>

                                    <form method="POST" class="forms-sample" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email address</label>

                                            <input id="email" placeholder="Enter Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@example.com" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">{{ __('Password') }}</label>

                                            <input id="userPassword"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="12345678" placeholder="Enter Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div>

                                            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                                {{ __('Login') }}
                                            </button>

{{--                                            @if (Route::has('password.request'))--}}
{{--                                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                                    {{ __('Forgot Your Password?') }}--}}
{{--                                                </a>--}}
{{--                                            @endif--}}

                                        </div>
{{--                                        <a href="" class="d-block mt-3 text-muted">Not registered yet? Register here</a>--}}
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

@endsection
