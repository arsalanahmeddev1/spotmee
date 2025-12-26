@extends('layouts.web.master')
@section('title', 'Forgot Password')
@section('content')

<section class="inner-banner about-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hd-lg">Forgot Password</h1>
            </div>
        </div>
    </div>
</section>

<section class="forgot-password-sec sec-dark-bg sec-gap-y">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-wrapper glass">
                    <form id="forgotPasswordForm" action="{{ url('/forgot-password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between mb-30">
                                    <div>
                                        <h4 class="secondry-font fs-60 text-white fw-700 mb-10">Reset Password</h4>
                                        <p class="para">
                                            Enter your email address and we'll send you a link to reset your password
                                        </p>
                                    </div>
                                    <div>
                                        <div class="img-wrapper">
                                            <img src="{{ asset('images/logo-02.png') }}" style="max-width: 40px;" alt="Logo">
                                        </div>
                                    </div>
                                </div>

                                <div class="field-wrapper mb-20">
                                    <label for="email" class="text-white fs-14 mb-10 d-block">Email Address</label>
                                    <input type="email" id="email" name="email" class="glass input-field" placeholder="your.email@example.com" required>
                                </div>

                                <div class="field-wrapper mb-20">
                                    <button type="submit" class="bootstrap btn btn-primary w-100 submit-btn">
                                        <i class="fa-solid fa-paper-plane me-10"></i> Send Reset Link
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-white fs-14 mb-10">
                                        Remember your password? 
                                        <a href="{{ route('login') }}" class="text-secondry-theme fw-600">Back to Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

