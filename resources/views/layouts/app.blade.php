<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>Liyag</title>
        {{--
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> --}}


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @stack('styles')

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                margin: 0 !important;
                padding: 0 !important;
            }

            .custom-navbar {
                background-color: #fff7f0 !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
                font-family: 'Georgia', serif;
                padding: 0.5rem 0;
            }

            .btn-nav {
                background-color: #d8c0aa;
                color: white;
                border: none;
                border-radius: 20px;
                padding: 0.4rem 1.2rem;
                font-weight: 600;
                text-decoration: none;
                transition: background 0.3s ease;
                margin-right: 1rem;
            }

            .btn-nav:hover {
                background-color: #c8ae97;
                color: white;
            }

            .custom-nav-link {
                color: #4b2e2e !important;
                font-weight: 600;
            }

            .navbar-brand {
                margin-right: 1rem;
            }

            .navbar-brand img {
                height: 80px;
                object-fit: contain;
                padding-right: 10px;
            }

            .navbar-nav {
                gap: 0.5rem;
            }

            .navbar-nav.ms-auto {
                margin-left: 10rem;
                padding-left: 1rem;
            }

            /* Footer Styles */
            .custom-footer {
                background-color: #A79277;
                width: 100%;
                padding: 3rem 1rem;
                font-family: 'Georgia', serif;
                color: #4b2e2e;
                box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05);
                margin-top: auto;
                position: relative;
                z-index: 2;
            }

            .footer-title {
                font-size: 1.2rem;
                font-weight: bold;
                margin-bottom: 1rem;
                color: #4b2e2e;
            }


            .footer-link {
                display: block;
                color: #6d4e3b;
                text-decoration: none;
                margin-bottom: 0.4rem;
                transition: color 0.2s ease;
            }

            .footer-link:hover {
                color: #a46a4e;
                text-decoration: underline;
            }

            .custom-footer img {
                height: 100px;
                object-fit: contain;
                margin-bottom: 0.50rem;
            }

            @media (max-width: 768px) {
                .custom-footer {
                    text-align: center;
                }

                .footer-title {
                    margin-top: 1.5rem;
                }

                .footer-title:first-child {
                    margin-top: 0;
                }

                .btn-nav {
                    margin-left: 0;
                    margin-top: 0.25rem;
                }
            }

            #app {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            main {
                flex: 1;
                padding: 0 !important;
                margin: 0 !important;
            }

            main.with-padding {
                padding: 1.5rem !important;
            }
        </style>


    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md custom-navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Liyag Logo" class="footer-logo">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto align-items-center">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="btn btn-nav" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="btn btn-nav" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle custom-nav-link" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main @if(!Request::is('/') && !Request::is('welcome')) class="with-padding" @endif>
                @yield('content')
            </main>

            @if(isset($showFooter) && $showFooter || Route::currentRouteName() == 'welcome' || Request::is('/'))
                <footer class="custom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="Liyag Logo">
                                <p>© {{ date('Y') }} All rights reserved.</p>
                            </div>

                            <div class="col-lg-2 col-md-6 mb-4">
                                <h6 class="footer-title">Go back</h6>
                                <a href="#hero" class="footer-link">Login</a>
                                <a href="#features" class="footer-link">Features</a>
                                <a href="#testimonials" class="footer-link">Testimonials</a>
                                <a href="#weddings" class="footer-link">Real Weddings</a>
                                <a href="#about" class="footer-link">Meet the Team</a>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <h6 class="footer-title">Resources</h6>
                                <a href="https://drive.google.com/file/d/1rI8g42u4WK9QODJzXtzPETIUpSFmunJg/view?usp=sharing"
                                    target="_blank" class="footer-link">Terms of Service</a>
                                <a href="https://drive.google.com/file/d/1LHLeR3ud4Gj9XAZqE4KKNc2WzsVaz34V/view?usp=sharing"
                                    target="_blank" class="footer-link">Privacy Policy</a>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <h6 class="footer-title">Connect</h6>
                                <a href="#" class="footer-link">Facebook</a>
                                <a href="#" class="footer-link">Instagram</a>
                                <a href="#" class="footer-link">Email Us</a>
                            </div>
                        </div>
                    </div>
                </footer>
            @endif
        </div>
    </body>

</html>