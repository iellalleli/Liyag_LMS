@extends('layouts.app')

@section('content')

<!-- 🌸 All Styles at the Top -->
<style>
    body, html {
        margin: 0;
        padding: 0;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 100vh;
        overflow: hidden;
    }

    .video-bg {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .hero-overlay {
        height: 100%;
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

    /* Features Section */
    .features-section {
        background: url('{{ asset('images/section-bg.png') }}') no-repeat center center;
        background-size: cover;
        padding: 6rem 2rem;
        position: relative;
        z-index: 2;
    }

    .features-box {
        max-width: 1100px;
        margin: 0 auto;
        border-radius: 25px;
        padding: 3rem 2rem;
        font-family: 'Georgia', serif;
        color: #4b2e2e;
        text-align: center;
    }

    .features-heading {
        font-size: 3rem;
        font-weight: bold;
        margin-top: 0;
        margin-bottom: 2.5rem;
        color: #6F4E37;
        text-shadow: 0 4px 24px rgba(0, 0, 0, 0.2), 0 1.5px 0 #D1BB9E;
    }

    .feature-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 2rem;
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
        color: #6F4E37;
    }

    .feature-desc {
        font-size: 0.95rem;
        color: #6d4e3b;
    }

    /* Testimonials Section */
    .testimonials-section {
        background: url('{{ asset('images/section-bg.png') }}') no-repeat center center;
        background-size: 100% 100%;
        padding: 5rem 2rem;
        font-family: 'Georgia', serif;
        color: #4b2e2e;
        text-align: center;
        position: relative;
        z-index: 1;
    }
    .testimonials-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .testimonials-heading {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 3rem;
        color: #6F4E37;
        text-shadow:
            0 4px 24px rgba(101, 67, 33, 0.18),
            0 1.5px 0 #D1BB9E,
            0 8px 16px rgba(111, 78, 55, 0.25),
            0 12px 24px rgba(111, 78, 55, 0.18);
    }

    .testimonial-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
        transition: transform 0.3s, box-shadow 0.3s;
        /* Removed box-shadow on hover */
        }
        .testimonial-item:hover {
        transform: translateY(-8px) scale(1.03);
        /* box-shadow removed */
        background: #fff;
        }
        .testimonial-item:hover .testimonial-avatar {
        box-shadow: 0 8px 24px rgba(111, 78, 55, 0.18);
        border-color: #d8c0aa;
        }
        .testimonial-item:hover .testimonial-quote {
        background-color: #fff;
        color: #6F4E37;
        }

    .testimonial-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .testimonial-avatar.left {
        order: 1;
    }

    .testimonial-avatar.right {
        order: 2;
    }

    .testimonial-quote {
        background-color: #fff;
        border-radius: 15px;
        padding: 1.5rem 2rem;
        /* Removed box-shadow */
        max-width: 600px;
        font-style: italic;
        position: relative;
        order: 2;
    }

    .testimonial-quote p {
        margin: 0 0 0.5rem;
        font-size: 1rem;
        color: #6d4e3b;
    }

    .testimonial-name {
        font-weight: bold;
        display: block;
        font-size: 0.95rem;
        color: #4b2e2e;
    }

    /* Real Wedding Stories Carousel */
    .real-wedding-section {
        background: url('{{ asset('images/section-bg.png') }}') no-repeat center center;
        background-size: 100% 100%;
        padding: 5rem 2rem;
        font-family: 'Georgia', serif;
        color: #4b2e2e;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .carousel-inner img {
        border-radius: 20px;
        object-fit: cover;
        height: 480px;
        width: 100%;
    }

    .carousel-caption {
        background: rgba(255, 255, 255, 0.8);
        padding: 1.5rem;
        border-radius: 15px;
        color: #4b2e2e;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .carousel-caption h5 {
        font-weight: bold;
        color: #6F4E37;
    }

    .carousel-caption p {
        font-style: italic;
        color: #4b2e2e;
        margin-bottom: 0.5rem;
    }

    .carousel-item {
        transition: transform 0.8s ease, opacity 0.8s ease;
    }

    .real-wedding-heading {
        font-size: 2.5rem;
        color: #6F4E37;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow:
            0 4px 24px rgba(101, 67, 33, 0.18),
            0 1.5px 0 #D1BB9E,
            0 8px 16px rgba(111, 78, 55, 0.25),
            0 12px 24px rgba(111, 78, 55, 0.18),
            0 6px 12px rgba(111, 78, 55, 0.22);
    }

    /* About Us Section */
    .about-section {
        background: linear-gradient(135deg, #fdf6f0, #e0d5c7);
        padding: 6rem 2rem;
    }

    .container {
        max-width: 1200px;
        margin: auto;
    }

    .about-heading {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.5rem;
        background: linear-gradient(45deg, #6F4E37, #8B4513, #A0522D);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .about-subheading {
        font-family: 'Inter', sans-serif;
        font-size: 1.2rem;
        font-weight: 300;
        color: #6d4e3b;
        text-align: center;
        max-width: 800px;
        margin: 0 auto 4rem;
        line-height: 1.6;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .team-member {
        background: rgba(255, 255, 255, 0.5);
        border-radius: 24px;
        padding: 2rem;
        text-align: center;
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .team-member:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .team-photo-container {
        height: 250px;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 1.5rem;
    }

    .team-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.3s ease;
    }

    .team-info {
        font-family: 'Inter', sans-serif;
    }

    .team-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: #6F4E37;
        margin-bottom: 0.3rem;
    }

    .team-role {
        font-size: 1rem;
        color: #6d4e3b;
        margin-bottom: 1rem;
    }

    .team-socials {
        display: flex;
        justify-content: center;
        gap: 1rem;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .team-member:hover .team-socials {
        opacity: 1;
        transform: translateY(0);
    }

    .team-socials a {
        color: #6F4E37;
        font-size: 1.2rem;
        transition: color 0.2s;
    }

    .team-socials a:hover {
        color: #A0522D;
    }

    @media (max-width: 1024px) {
        .team-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .team-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .testimonial-item {
            flex-direction: column;
        }

        .testimonial-avatar.left,
        .testimonial-avatar.right {
            order: 1;
        }

        .testimonial-quote {
            order: 2;
        }

        .custom-footer {
            text-align: center;
        }

        .footer-title {
            margin-top: 1.5rem;
        }

        .footer-title:first-child {
            margin-top: 0;
        }
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- 🌸 Hero Section -->
<section class="hero-section" id="hero">
    <video autoplay muted loop class="video-bg">
        <source src="{{ asset('videos/wedding.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="hero-overlay">
        <div class="center-message animate-fade">
            <p class="main-text">
                For every heartbeat beyond <em>‘I do’</em>,<br>we’re with you.
            </p>

            <div class="auth-buttons mt-4">
                @auth
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('sales_rep'))
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-soft">Go to Dashboard</a>
                    @elseif(auth()->user()->hasRole('client'))
                        <a href="{{ route('client.quotations.create') }}" class="btn btn-soft">Get Quotation</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-soft">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-soft">Sign-up and Get Quotation</a>
                @endauth
            </div>

            <p class="mt-4" style="font-size: 1rem; color: #4b2e2e;">
                We're honored to be part of your special journey.
                By continuing, you agree to Liyag’s 
                <a href="https://docs.google.com/document/d/your-terms-doc-id/view" target="_blank" style="color:#a46a4e; font-weight: 600; text-decoration: underline;">Terms & Conditions</a> 
                and 
                <a href="https://docs.google.com/document/d/your-privacy-doc-id/view" target="_blank" style="color:#a46a4e; font-weight: 600; text-decoration: underline;">Privacy Policy</a>.
            </p>
        </div>
    </div>
</section>

<!-- 🌸 Features Section -->
<section class="features-section" id="features">
    <div class="features-box">
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
</section>

<!-- 🌸 Testimonials Section -->
<section class="testimonials-section" id="testimonials">
    <div class="testimonials-container">
        <h4 class="testimonials-heading">
            Aside from vowing ‘I do’, the couples say they love us too! <br><span style="font-weight: 400;">(and we love them)</span>
        </h4>

        <div class="testimonial-item">
            <img src="{{ asset('images/avatars/gabbi.png') }}" alt="Gabbi & Khalil" class="testimonial-avatar left">
            <div class="testimonial-quote">
                <p>“We were able to plan our dream wedding effortlessly thanks to this amazing site! Babait ng mga Sales Rep. 😍”</p>
                <span class="testimonial-name">Gabbi & Khalil</span>
            </div>
        </div>

        <div class="testimonial-item">
            <div class="testimonial-quote">
                <p>“I love the process, bilis lang! Nagustuhan namin yung style ng wedding. Baka magpakasal kami ulit – hangkuleet?!”</p>
                <span class="testimonial-name">Claudia & Sebastian</span>
            </div>
            <img src="{{ asset('images/avatars/claudia.png') }}" alt="Claudia & Sebastian" class="testimonial-avatar right">
        </div>

        <div class="testimonial-item">
            <img src="{{ asset('images/avatars/bianca.png') }}" alt="Bianca & Will" class="testimonial-avatar left">
            <div class="testimonial-quote">
                <p>“Love the fast and smooth process! ‘di pa kami nakakalabas sa BNK, kasal na kami <3”</p>
                <span class="testimonial-name">Bianca & Will</span>
            </div>
        </div>
    </div>
</section>

<!-- 🌸 Real Wedding Stories Carousel -->
<section class="real-wedding-section" id="weddings">
    <div class="container">
        <h4 class="real-wedding-heading">Vows, Wows, and Everything In Between</h4>

        <div id="weddingCarousel" class="carousel slide mx-auto" data-bs-ride="carousel" style="max-width: 960px;">
            <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('images/weddings/couple1.jpg') }}" class="d-block w-100" alt="Marco & Lea" style="height:450px; object-fit:cover; border-radius:18px;">
                <div class="carousel-caption">
                <h5>Kat and Joel</h5>
                <p>“POV First time n'yong kinasal. Thank you, Liyag!”</p>
                <small>May 29 2025 – Tagaytay Highlands</small>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('images/weddings/couple2.jpg') }}" class="d-block w-100" alt="Jenna & Luis" style="height:450px; object-fit:cover; border-radius:18px;">
                <div class="carousel-caption">
                <h5>Kween Yasmin & Elmer Villacura A.k.A Troy Tuyor</h5>
                <p>“Sure sure sure I smile my mouth. Worth the gastos, Liyag 💗”</p>
                <small>January 28, 2025 – Palawan Beach Resort</small>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('images/weddings/couple3.jpg') }}" class="d-block w-100" alt="Trixie & Paulo" style="height:450px; object-fit:cover; border-radius:18px;">
                    <div class="carousel-caption">
                        <h5>Criza & Onie</h5>
                        <p>“Atake 'yung Liyag! Na-enjoy namin ang "friendly" wedding namin ng BFF ko 😆”</p>
                        <small>June 25, 2025 – Tagaytay, Philippines</small>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#weddingCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#weddingCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <!-- Indicators -->
            <div class="carousel-indicators mt-4">
                <button type="button" data-bs-target="#weddingCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#weddingCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#weddingCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </div>
</section>

<!-- 🌸 About Us Section -->
<section class="about-section" id="about">
  <div class="container">
    <h2 class="about-heading">The Hearts Behind Liyag</h2>
    <p class="about-subheading">
      We are Group 7 from BSCS 3-2’s Web Development class — a passionate team of developers and creatives working together to make wedding planning seamless, stylish, and uniquely you. 💍✨
    </p>

    <div class="team-grid">
    <!-- Yoj -->
    <div class="team-member">
      <div class="team-photo-container">
        <img src="{{ asset('images/members/yoj.jpg') }}" alt="Yoj" class="team-photo">
      </div>
      <div class="team-info">
        <h5 class="team-name">Yoj Siapengco</h5>
        <p class="team-role">Project Manager | Developer</p>
        <div class="team-socials">
        <a href="mailto:yoj@email.com" target="_blank"><i class="fas fa-envelope"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>

    <!-- Mariella -->
    <div class="team-member">
      <div class="team-photo-container">
        <img src="{{ asset('images/members/mariella.jpg') }}" alt="Mariella" class="team-photo">
      </div>
      <div class="team-info">
        <h5 class="team-name">Mariella Prado</h5>
        <p class="team-role">Backend Developer</p>
        <div class="team-socials">
        <a href="mailto:mariella@email.com" target="_blank"><i class="fas fa-envelope"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>

    <!-- Jenna -->
    <div class="team-member">
      <div class="team-photo-container">
        <img src="{{ asset('images/members/jenna.jpg') }}" alt="Jenna" class="team-photo">
      </div>
      <div class="team-info">
        <h5 class="team-name">Jenna Mae Lopez</h5>
        <p class="team-role">Frontend Developer</p>
        <div class="team-socials">
        <a href="mailto:jenna@email.com" target="_blank"><i class="fas fa-envelope"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>

    <!-- Aki -->
    <div class="team-member">
      <div class="team-photo-container">
        <img src="{{ asset('images/members/aki.jpg') }}" alt="Aki" class="team-photo">
      </div>
      <div class="team-info">
        <h5 class="team-name">Alexa Kimberly Macasinag</h5>
        <p class="team-role">UI/UX | Content</p>
        <div class="team-socials">
        <a href="mailto:aki@email.com" target="_blank"><i class="fas fa-envelope"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
