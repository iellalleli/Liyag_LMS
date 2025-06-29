@extends('layouts.app')

@section('content')

<!-- 🌸 Inline Styles -->
<style>
    .video-bg {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .hero-overlay {
        min-height: 100vh;
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        padding: 6rem 2rem 2rem 2rem;
        position: relative;
        z-index: 1;
    }

    .center-message {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        padding: 3rem;
        background: rgba(248, 237, 221, 0.65);
        border-radius: 25px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        font-family: 'Georgia', serif;
        color: #4b2e2e;
    }

    .center-message .main-text {
        font-size: 2.5rem;
        line-height: 1.6;
        font-weight: 500;
        letter-spacing: 1.5px;
        text-shadow: 0 4px 24px rgba(101, 67, 33, 0.25), 0 1.5px 0 #D1BB9E;
        animation: fadeInUp 1.2s ease-out;
    }

    .btn-soft {
        background-color: #d8c0aa;
        color: white;
        border: none;
        border-radius: 25px;
        padding: 0.6rem 1.4rem;
        font-weight: 600;
        text-decoration: none;
        margin: 0 10px;
        transition: background 0.3s ease;
    }

    .btn-soft:hover {
        background-color: #c8ae97;
        color: white;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade {
        animation: fadeInUp 1s ease-out;
    }

/* Add this to your existing styles */

.features-box {
    max-width: 1100px;
    margin: 1.5rem auto 0 auto;
    border-radius: 25px;
    padding: 3rem 2rem;
    font-family: 'Georgia', serif;
    color: #4b2e2e;
    text-align: center;
    position: relative;
    z-index: 2;
    background: transparent;
    box-shadow: none;
}

.features-heading {
    font-size: 3rem;
    font-weight: bold;
    margin-top: 0; 
    margin-bottom: 2.5rem;
    color: #4b2e2e;
    text-shadow: 0 4px 24px rgba(101, 67, 33, 0.25), 0 1.5px 0 #D1BB9E;
}

.feature-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 2rem;
    margin-bottom: 10rem;
}

.feature-item {
    flex: 1 1 300px;
    max-width: 300px;
    background: #f9f3ec;
    border-radius: 18px;
    padding: 2rem 1.5rem;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
}

.icon-circle {
    font-size: 2rem;
    background: #d8c0aa;
    color: white;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border-radius: 50%;
    margin: 0 auto 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: #4b2e2e;
}

.feature-desc {
    font-size: 0.95rem;
    color: #6d4e3b;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .custom-footer {
        text-align: center;
    }
    
    .footer-title {
        margin-top: 1.5rem;
    }
    
    .footer-title:first-child {
        margin-top: 0;
    } */
}

</style>

<!-- 🌸 Background Video -->
<video autoplay muted loop class="video-bg">
    <source src="{{ asset('videos/wedding.mp4') }}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<!-- 🌸 Overlay with Main Text & Buttons -->
<div class="hero-overlay">
    <div class="center-message animate-fade">
        <p class="main-text">
            For every heartbeat beyond <em>‘I do’</em>,<br>we’re with you.
        </p>

        <div class="auth-buttons mt-4">
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-soft">Go to Dashboard</a>
                @elseif(auth()->user()->hasRole('sales_rep'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-soft">Go to Dashboard</a>
                @elseif(auth()->user()->hasRole('client'))
                    <a href="{{ route('client.quotations.create') }}" class="btn btn-soft">Get Quotation</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-soft">Login</a>
                <a href="{{ route('register') }}" class="btn btn-soft">Sign-up and Get Quotation</a>
            @endauth
        </div>

        <!-- 🌸 Disclaimer now inside -->
        <p class="mt-4" style="
            font-size: 1rem;
            color: #4b2e2e;
            font-family: 'Georgia', serif;
            text-align: center;">
            We're honored to be part of your special journey.
            By continuing, you agree to Liyag’s 
            <a href="https://docs.google.com/document/d/your-terms-doc-id/view" target="_blank" style="color:#a46a4e; font-weight: 600; text-decoration: underline;">Terms & Conditions</a> 
            and 
            <a href="https://docs.google.com/document/d/your-privacy-doc-id/view" target="_blank" style="color:#a46a4e; font-weight: 600; text-decoration: underline;">Privacy Policy</a>.
        </p>
    </div>
</div>


<!-- 🌸 Feature Highlights -->
<div class="features-box mt-5">
    <h4 class="features-heading">What You Can Do Here</h4>
    <div class="feature-row">
        <div class="feature-item">
            <div class="icon-circle">🛠️</div>
            <h6 class="feature-title">Admin Panel</h6>
            <p class="feature-desc">Manage sales reps, monitor leads, and oversee platform operations with ease.</p>
        </div>
        <div class="feature-item">
            <div class="icon-circle">📋</div>
            <h6 class="feature-title">Sales Rep Tools</h6>
            <p class="feature-desc">Track your assigned leads, manage daily tasks, and engage with potential clients.</p>
        </div>
        <div class="feature-item">
            <div class="icon-circle">💌</div>
            <h6 class="feature-title">Client Access</h6>
            <p class="feature-desc">Request personalized wedding quotations and easily send event inquiries online.</p>
        </div>
    </div>
</div>


</div>


@endsection

