@extends('layouts.app')

@section('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    main.with-padding {
        padding: 0 !important;
    }

    .register-container {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fdf6f0, #f0e5d8);
    }

    .register-wrapper {
        width: 100%;
        max-width: 700px;
        background: rgba(255, 255, 255, 0.9);
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        backdrop-filter: blur(8px);
        margin-top:2rem;
        margin-bottom:10rem;
    }

    .register-title {
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
        width: 100%;
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
        width: 100%;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #6F4E37, #4a3226);
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 0.25rem;
    }

    .register-actions {
        margin-top: 1.5rem;
    }

    .login-link {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: #6F4E37;
    }

    .login-link a {
        color: #8B4513;
        text-decoration: underline;
        font-weight: 500;
    }

    .login-link a:hover {
        color: #6F4E37;
    }

    @media (max-width: 576px) {
        .register-wrapper {
            padding: 1.5rem;
            margin: 0.5rem;
        }

        .register-title {
            font-size: 1.75rem;
        }
    }
</style>

<div class="register-container">
    <div class="register-wrapper">
        <div class="register-title">Create Your Account</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">
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
                       name="password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                       class="form-control" name="password_confirmation"
                       required autocomplete="new-password">
            </div>

            <div class="register-actions">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="login-link">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </div>
</div>

@endsection
