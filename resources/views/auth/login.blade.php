@extends('layouts.guest')

@section('title', 'Login')

@section('content')


<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0">
                <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                    <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                        <img src="{{ asset('image/logo3.jpg') }}" style="height: 100px; width: 100px;">
                    </svg>
                    <h2 class="brand-text text-primary ml-1">ATK</h2>
                </a>
                <!-- /Brand logo-->
                <!-- Left Text-->
                <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                    <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('app-assets/images/pages/login-v2.svg') }}" alt="Login V2" /></div>
                </div>
                <!-- /Left Text-->
                <!-- Login-->
                <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                        <h2 class="card-title font-weight-bold mb-1">Welcome to ATK! 👋</h2>
                        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                       
                        <form class="auth-login-form mt-2"  method="POST" action="{{ route('login') }}">
                            
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="login-email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="login-password">Password</label></a>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                  <input id="password" type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                  <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                    <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                        </form>
                       
                    </div>
                </div>
                <!-- /Login-->
            </div>
        </div>
    </div>
</div>


@endsection
