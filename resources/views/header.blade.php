<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ config('app.name', 'Online Counselling & Imotional Wellness Coach') }}</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/signup-modal.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
  @stack('styles')

</head>

<body>
  <header class="navbar">
    <div class="nav-left">
      <div class="logo">
        <span class="logo-icon"><img src="{{ asset('images/favicon.ico')}}" /></span>
        <a href="./"><span class="logo-text">Your<span>DOST</span></span></a>
      </div>

      <nav>
        <ul class="menu">
          <li class="has-mega">
            <a href="#">Our Solutions</a>

            <!-- MEGA MENU -->
            <div class="mega-menu">
              <div class="mega-col">
                <h4>For Corporates</h4>
                <a href="eap">E.A.P.</a>
                <a href="eap">Employee Engagement</a>
                <a href="eap">Culture Compass</a>
              </div>

              <div class="mega-col">
                <h4>For Colleges</h4>
                <a href="eap">Student Wellness</a>
                <a href="eap">Career Counselling</a>
                <a href="eap">Suicide Prevention</a>
              </div>

              <div class="mega-col">
                <h4>For Schools</h4>
                <a href="eap">Assessments</a>
                <a href="eap">Faculty Development</a>
                <a href="eap">Shadow Teachers</a>
              </div>
            </div>
          </li>

          <li><a href="#">Blog</a></li>
          <li><a href="#">The Festival of Joy</a></li>
        </ul>
      </nav>
    </div>

    <div class="nav-right">
      <?php
      //echo (auth()->user()->name);
      ?>
      @if(auth()->guest())
      <button class="btn-outline" onclick="openLoginModal()">Login / Signup</button>
      @endif
      <?php
      $currentUrl = $_SERVER['REQUEST_URI'];

      if (strpos($currentUrl, 'expert') === false) {
      ?>
        <button class="btn-primary" onclick="scrollToWellbeing()">Book A Demo</button>
      <?php
      }
      ?>

    </div>
  </header>
  <!-- MODAL BACKDROP -->
  <div class="modal-backdrop" id="loginModal">
    <div class="modal">
      <form method="post" action="{{ route('login') }}">
        @csrf
        <button class="close-btn" onclick="closeModal()">×</button>

        <h2 class="modal-title">Login</h2>

        <button class="btn mobile-btn">Login With Mobile</button>

        <div class="divider">
          <span>OR</span>
        </div>

        <button class="btn google-btn">
          <span class="google-icon">G</span> Google
        </button>

        <p class="helper-text">
          Don't worry, you stay anonymous even with social login.
        </p>

        <div class="divider">
          <span>OR</span>
        </div>

        <div class="input-group">
          <span class="icon">👤</span>
          <input type="text" name="email" placeholder="Email Or Username" />
        </div>

        <div class="input-group">
          <span class="icon">🔒</span>
          <input type="password" name="password" placeholder="Password" id="password" />
          <span class="eye" onclick="togglePassword()">👁️</span>
        </div>

        <a href="#" class="forgot-link" onclick="openResetModal()">Forgot username / password?</a>

        <button class="btn login-btn">LOGIN</button>

        <p class="signup-text">
          Don't have an account?
          <a href="#" onclick="openSignup()">Signup now</a>
        </p>
      </form>
    </div>
  </div>
  <script>
    function openResetModal() {
      closeModal(); // close login modal
      document.getElementById("resetModal").style.display = "flex";
    }

    function closeResetModal() {
      document.getElementById("resetModal").style.display = "none";
    }

    /* Close on backdrop click */
    document.getElementById("resetModal").addEventListener("click", function(e) {
      if (e.target === this) {
        closeResetModal();
      }
    });
  </script>

  <!-- RESET PASSWORD MODAL -->
  <div class="modal-overlay" id="resetModal">
    <div class="modal-box">
      <button class="close-btn" onclick="closeResetModal()">×</button>

      <h2 class="modal-title">Send Reset Password Link</h2>

      <form method="post" action="{{ route('password.request') }}">
        @csrf
        <div class="input-group simple">
          <label>Username</label>
          <input type="text" name="username">
        </div>

        <div class="or-text">OR</div>

        <div class="input-group simple">
          <label>Email Address</label>
          <input type="email" name="email">
        </div>

        <button type="submit" class="submit-btn">SUBMIT</button>
      </form>
    </div>
  </div>

  <!-- MODAL -->
  <div class="modal-overlay" id="signupModal">
    <div class="modal-box">
      <form method="post" action="{{ route('register') }}">
        @csrf
        <button class="close-btn" onclick="closeSignup()">×</button>

        <h2 class="modal-title">Sign Up - This'll be quick</h2>

        <button class="btn google-btn">
          <span class="google-icon">G</span> Google
        </button>

        <p class="note-text">
          Don't worry, you can anonymize yourself in the next step.
        </p>

        <div class="divider"><span>OR</span></div>

        <div class="input-row">
          <span class="icon">👤</span>
          <input type="text" placeholder="Username" name="username" value="{{ old('username') }}">

        </div>
        @error('username')
        <small class="error-text">{{ $message }}</small>
        @enderror
        <div class="input-row">
          <span class="icon">🔒</span>
          <input type="password" placeholder="Password" id="signupPassword" name="password">
          <span class="eye" onclick="toggleSignupPassword()">👁️</span>

        </div>
        @error('password')
        <small class="error-text">{{ $message }}</small>
        @enderror
        <div class="input-row">
          <span class="icon">✉️</span>
          <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">

        </div>
        @error('email')
        <small class="error-text">{{ $message }}</small>
        @enderror
        <label class="checkbox-row">
          <input type="checkbox" name="agree_terms" value="1">
          <span>
            By signing up you are agreeing to
            <a href="#">Terms of Services</a> and
            <a href="#">Privacy Policy</a> of YourDOST.
          </span>

        </label>
        @error('agree_terms')
        <small class="error-text">{{ $message }}</small>
        @enderror
        <button class="btn signup-btn">SIGNUP</button>

        <p class="footer-text">
          Have an account? <a href="#" onclick="javascript:openLoginModal()">Login now</a>
        </p>
      </form>
    </div>
  </div>


  <script>
    function openLoginModal() {
      document.getElementById("signupModal").style.display = "none";
      document.getElementById("loginModal").style.display = "flex";
    }

    function closeModal() {
      document.getElementById("loginModal").style.display = "none";
    }

    function togglePassword() {
      const pwd = document.getElementById("password");
      pwd.type = pwd.type === "password" ? "text" : "password";
    }

    /* Close on backdrop click */
    document.getElementById("loginModal").addEventListener("click", function(e) {
      if (e.target === this) {
        closeModal();
      }
    });

    function scrollToWellbeing() {
      const section = document.querySelector('.wellbeing-solution-section');
      if (section) {
        section.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    }
  </script>



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