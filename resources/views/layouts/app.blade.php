<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Online Counselling & Imotional Wellness Coach') }}</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/dashboard_menu.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    @stack('styles')

</head>



<body>
    <!-- Page Heading -->
    <header class="topbar">

        <!-- LOGO (left) -->
        <div class="logo">
            <span class="logo-icon"><img src="{{ asset('images/favicon.ico')}}" /></span>
            <a href="./"><span class="logo-text">Your<span>DOST</span></span></a>
        </div>

        <!-- RIGHT MENU -->
        <div class="top-right">

            <!-- NOTIFICATION -->
            <div class="icon notification">
                🔔
                <span class="badge">1</span>
            </div>

            <!-- PROFILE -->
            <div class="profile" onclick="toggleMenu()">
                <div class="dashboard_avatar">P</div>
                <span class="username">prathyush-1</span>
                <span class="arrow">▾</span>
            </div>

            <!-- DROPDOWN -->
            <div class="dropdown" id="profileMenu">
                <a href="#"><span>👤</span> My Profile</a>
                <a href="#"><span>⭐</span> Special Access</a>
                <a href="#"><span>🔒</span> Change Password</a>
                <div class="divider"></div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ↪ Logout
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>

            </div>

        </div>
    </header>
    <main class="content">
        @yield('content')
    </main>
    <section class="info-footer-section">
        <div class="content-container">

            <div class="about-us-column">
                <h3 class="column-title">About YourDOST</h3>
                <p class="about-text">
                    At YourDOST, we empower organizations to build resilient and thriving teams with our
                    evidence-based wellness solutions. Taking a proactive approach towards wellness, we
                    address emotional, social, financial, and physical well-being. Our holistic services provide
                    24/7 access to certified experts within 30 seconds, offering support in over 20 Indian
                    languages. The team includes psychologists, counsellors, nutritionists, and psychiatrists.
                </p>
                <p class="about-text">
                    Personalized programs are tailored to individual needs, featuring gamified and interactive
                    experiences. With a track record of supporting over 500 organizations, conducting 30 Lakh+
                    one-on-one sessions, and covering 23+ states, YourDOST has paved the way for improved
                    well-being and productivity.
                </p>

                <p class="helpline-text">
                    We are not a medical service or suicide prevention helpline. If you are feeling suicidal, we
                    would suggest you immediately call up a suicide prevention helpline – eg. Vandrevala
                    Foundation Helpline – 1 860 266 2345 (24x7), Aasra – +91 22 2754 6669 (24x7).
                </p>
            </div>

            <div class="expert-download-column">

                <div class="expert-card">
                    <div class="icon-section">
                        <div class="icon-bubble orange-bubble"></div>
                        <div class="icon-bubble purple-bubble"></div>
                    </div>
                    <div class="text-section">
                        <h3 class="column-title">Become an Expert</h3>
                        <p>Listen to others & be their friend in need</p>
                        <button class="btn-expert-cta" onclick="javascript:location.href='become-expert.php'">BECOME AN EXPERT</button>
                    </div>
                </div>

                <div class="download-section">
                    <h4 class="download-title">DOWNLOAD OUR APP</h4>
                    <div class="app-links">
                        <a href="#" class="app-store-link">
                            <img src="path/to/google_play_badge.png" alt="Get it on Google Play">
                        </a>
                        <a href="#" class="app-store-link">
                            <img src="path/to/app_store_badge.png" alt="Download on the App Store">
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="site-footer">
            <nav class="footer-nav-links">
                <a href="#">Team</a> |
                <a href="#">Jobs</a> |
                <a href="#">Terms of Service</a> |
                <a href="#">Privacy Policy</a> |
                <a href="#">Responsible Disclosure Policy</a> |
                <a href="#">Update Cookie Preferences</a> |
                <a href="#">Contact Us</a>
            </nav>
            <p class="copyright-text">© YourDOST 2024</p>
        </div>
    </section>
    @stack('scripts')
</body>






</html>