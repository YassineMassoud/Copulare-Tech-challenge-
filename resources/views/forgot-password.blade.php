@extends('auth-layouts.app')
@section('title','Forgot Password')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white p-3 bg-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="{{ url("/") }}" class="noble-ui-logo d-block mb-2">
                                            <img src="{{URL::asset('assets/images/login/Hyperlook_logo.png')}}" alt="Logo" height="40">
                                        </a>
                                        <h5 class="text-muted fw-normal mb-4">Enter your email address.</h5>

                                        <form method="POST" class="forms-sample" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">Email address</label>

                                                <input id="email" placeholder="Enter Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror


                                            </div>
                                            <div>

                                                <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                                    {{ __('Send Reset Request') }}
                                                </button>



                                            </div>
                                            <div class="d-flex">
                                                <a class="d-block mt-3" href="{{ route('login') }}">
                                                    {{ __('Login') }}
                                                </a> <span class="mt-3 mx-2">|</span> <a href="" class="d-block mt-3 text-muted">Not registered yet? Register here</a>
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

@endsection
