@extends('layouts.web.master')
@section('title', 'Join')
@section('content')

    <section class="auth-banner-sec login-banner" style="background-image: url('{{ asset('images/banner-img.png') }}');">
        <div class="auth-container">
            <div class="auth-row">
                <div class="w-full text-center">
                    <h1 class="auth-heading">Join the League</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-row">
                <div class="auth-col-wide">
                    <div class="auth-card">
                        <form id="joinForm" action="{{ url('/register') }}" method="POST">
                            @csrf

                            <div class="auth-header">
                                <div>
                                    <h4 class="auth-title">Create Account</h4>
                                    <p class="auth-subtitle">
                                        Join the League of Contractors and start building your network
                                    </p>
                                </div>
                            </div>

                            <div class="auth-field-group">
                                <label for="firstName" class="auth-label">Full Name</label>
                                <input type="text" id="firstName" name="name" class="auth-input" placeholder="John"
                                    required>
                            </div>

                            <div class="auth-field-group">
                                <label for="email" class="auth-label">Email Address</label>
                                <input type="email" id="email" name="email" class="auth-input"
                                    placeholder="your.email@example.com" required>
                            </div>

                            <div class="auth-field-group">
                                <label for="phone" class="auth-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="auth-input"
                                    placeholder="+1 (555) 123-4567" required>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="auth-field-group">
                                    <label for="password" class="auth-label">Password</label>
                                    <input type="password" id="password" name="password" class="auth-input"
                                        placeholder="Create a password" required>
                                </div>

                                <div class="auth-field-group">
                                    <label for="password_confirmation" class="auth-label">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="auth-input" placeholder="Confirm your password" required>
                                </div>
                            </div>

                            <div class="auth-options">
                                <div class="auth-checkbox-wrapper">
                                    <input class="auth-checkbox" type="checkbox" id="agreeTerms" name="agreeTerms" required>
                                    <label class="auth-checkbox-label" for="agreeTerms">
                                        I agree to the <a href="#" class="text-blue-400 hover:text-blue-300">Terms &
                                            Conditions</a> and <a href="#"
                                            class="text-blue-400 hover:text-blue-300">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>

                            <div class="auth-field-group">
                                <button type="submit" class="cta-btn w-full">
                                    <i class="fa-solid fa-user-plus me-2"></i> Join
                                </button>
                            </div>

                            <div class="auth-footer">
                                <p class="auth-footer-text">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="auth-footer-link">Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
