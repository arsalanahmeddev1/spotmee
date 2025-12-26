@extends('layouts.web.master')
@section('title', 'Login')
@section('content')

    <section class="auth-banner-sec login-banner" style="background-image: url('{{ asset('images/banner-img.png') }}');">
        <div class="auth-container">
            <div class="auth-row">
                <div class="w-full text-center">
                    <h1 class="auth-heading">Login</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-row">
                <div class="auth-col">
                    <div class="auth-card">
                        <form id="loginForm" action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="auth-header">
                                <div>
                                    <h4 class="auth-title">Welcome</h4>
                                    <p class="auth-subtitle">
                                        Sign in to your account to continue
                                    </p>
                                </div>
                            </div>

                            <div class="auth-field-group">
                                <label for="email" class="auth-label">Email Address</label>
                                <input type="email" id="email" name="email" class="auth-input"
                                    placeholder="your.email@example.com" required>
                            </div>

                            <div class="auth-field-group">
                                <label for="password" class="auth-label">Password</label>
                                <input type="password" id="password" name="password" class="auth-input"
                                    placeholder="Enter your password" required>
                            </div>

                            <div class="auth-options">
                                <div class="auth-checkbox-wrapper">
                                    <input class="auth-checkbox" type="checkbox" id="rememberMe" name="remember">
                                    <label class="auth-checkbox-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="auth-forgot-link">Forgot Password?</a>
                            </div>

                            <div class="auth-field-group">
                                <button type="submit" class="cta-btn w-full">
                                    <i class="fa-solid fa-sign-in-alt px-2"></i> Login
                                </button>
                            </div>

                            <div class="auth-footer">
                                <p class="auth-footer-text">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="auth-footer-link">Join Now</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
