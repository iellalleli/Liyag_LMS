@extends('layouts.app')

@section('content')

<!-- Custom fonts & styles to match welcome.blade.php -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    /* Remove any inherited padding from the main layout */
    main.with-padding {
        padding: 0 !important;
    }

    .login-container {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fdf6f0, #f0e5d8);
    }

    .login-wrapper {
        max-width: 500px;
        background: rgba(255, 255, 255, 0.9);
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        backdrop-filter: blur(8px);
        margin: 1rem; /* Small margin for mobile */
    }

    .login-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        color: #6F4E37;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        border-radius: 12px;
        padding: 0.75rem;
        border: 1px solid #ccc;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #6F4E37;
        display: block;
    }

    .btn-primary {
        background: linear-gradient(45deg, #a1866f, #6F4E37);
        border: none;
        border-radius: 12px;
        padding: 0.6rem 1.5rem;
        font-weight: 600;
        color: white;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #6F4E37, #4a3226);
    }

    .btn-link {
        color: #8B4513;
        font-size: 0.9rem;
        text-decoration: underline;
    }

    .form-check {
        margin-bottom: 1.5rem;
    }

    .form-check-label {
        font-size: 0.9rem;
        color: #4b2e2e;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 0.25rem;
    }

    .login-actions {
        margin-top: 1.5rem;
    }

    @media (max-width: 576px) {
        .login-wrapper {
            padding: 1.5rem;
            margin: 0.5rem;
        }
        
        .login-title {
            font-size: 1.75rem;
        }
    }
</style>

<!-- Centered login section with no extra padding -->
<div class="login-container">
    <div class="login-wrapper">
        <div class="login-title">Login to Your Account</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="d-flex justify-content-between align-items-center login-actions">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection