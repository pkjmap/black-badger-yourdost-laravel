@extends('header')
@section('content')
<!-- HERO SOLUTIONS SECTION -->
    <!-- <header class="page-header">
        <div class="yourdost-logo">
            <a href="index.php"><span class="logo-icon"></span>Your DOST</a>
        </div>
        <nav class="header-nav">
            <a href="#">EXPERTS</a>
            <a href="#">BLOG</a>
        </nav>
    </header> -->

    <section class="hero-banner">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">We help leading employers <br> create <strong>Happier Workplaces.</strong></h1>
                <p class="hero-description">
                    Our technology platform offers stigma-free therapeutic solutions. Join the leaders who have created happier workplaces for <strong>10+ million lives.</strong>
                </p>
                <button class="btn btn-callback" onclick="openModal()">REQUEST A CALLBACK</button>
            </div>
            <div class="hero-illustration-container">
                <div class="hero-illustration-figure"></div>
            </div>
        </div>
    </section>
    
    <section class="stats-section">
  <h2>Every second Indian employee is experiencing Chronic Stress</h2>

  <div class="stats-grid">
    <div class="stat-item">
      <div class="stat-number-wrapper">
        <span class="stat-number">1 in 2</span>
        <span class="stat-text">employees suffer from chronic stress</span>
      </div>
    </div>

    <div class="stat-item">
      <div class="stat-number-wrapper">
        <span class="stat-number counter" data-target="90">0%</span>
        <span class="stat-text">do not seek any evidence-based treatments</span>
      </div>
    </div>

    <div class="stat-item">
      <div class="stat-number-wrapper">
        <span class="stat-number counter" data-target="60">0%</span>
        <span class="stat-text">do not show any symptoms</span>
      </div>
    </div>
  </div>

  <p class="stats-source">*Sources: ASSOCHAM 2015 Report</p>
</section>
<script>
  const counters = document.querySelectorAll('.counter');

  const animateCounter = (counter) => {
    const target = +counter.getAttribute('data-target');
    let count = 0;
    const speed = 25;

    const update = () => {
      if (count < target) {
        count++;
        counter.textContent = count + "%";
        setTimeout(update, speed);
      } else {
        counter.textContent = target + "%";
      }
    };

    update();
  };

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.6 }
  );

  counters.forEach(counter => observer.observe(counter));
</script>

  <section class="problem-section">
  <h2 class="section-title">
    How big is the problem in <span>YOUR</span> organisation?
  </h2>

  <div class="problem-wrapper">
    <!-- LEFT -->
    <div class="employees-box">
      <h3>Number of Employees</h3>

      <div class="employee-count">50</div>

      <div class="slider-track">
        <div class="slider-thumb"></div>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="stats-box">
      <div class="stat-row">
        <p>Employees with a common mental health condition*</p>
        <div class="bar">
          <div class="bar-fill purple" style="width:42%">
            <span>21</span>
          </div>
        </div>
      </div>

      <div class="stat-row">
        <p>Employees suffering in silence*</p>
        <div class="bar">
          <div class="bar-fill orange" style="width:38%">
            <span>19</span>
          </div>
        </div>
      </div>

      <div class="stat-row">
        <p>Employees not showing any signs of distress*</p>
        <div class="bar">
          <div class="bar-fill yellow" style="width:26%">
            <span>13</span>
          </div>
        </div>
      </div>

      <p class="source">*Sources: ASSOCHAM 2015 Report</p>
    </div>
  </div>
</section>

  <section class="partner-succeed-section">
      <h2 class="section-heading">We partner with you to help YOU succeed</h2>
      
      <div class="cards-container">
          
          <div class="info-card">
              <div class="card-image-wrapper purple-bg">
                  <div class="icon-placeholder thumb-chat"></div>
              </div>
              <div class="card-content">
                  <h3 class="card-title">Higher Engagement Rates & ROI</h3>
                  <p class="card-description">
                      EAPs engage 2-3% of employees, while YourDOST sees 5-7x higher rates of signup. We build customised communication strategies for higher awareness.
                  </p>
              </div>
          </div>
          
          <div class="info-card">
              <div class="card-image-wrapper orange-bg">
                  <div class="icon-placeholder people-check"></div>
              </div>
              <div class="card-content">
                  <h3 class="card-title">High Satisfaction</h3>
                  <p class="card-description">
                      95% of the users on YourDOST rate their counseling sessions 3 or more on a scale of 5. We have a proactive supervision process to address low ratings.
                  </p>
              </div>
          </div>
          
          <div class="info-card">
              <div class="card-image-wrapper yellow-bg">
                  <div class="icon-placeholder chart-icon"></div>
              </div>
              <div class="card-content">
                  <h3 class="card-title">In-depth Outcomes Reporting</h3>
                  <p class="card-description">
                      We deliver quarterly in-depth anonymised reports on observations, learnings and recommendations for thematic issue identification and elimination.
                  </p>
              </div>
          </div>
          
      </div>
  </section>
  <section class="what-we-offer-section">
      <h2 class="section-heading">What we offer</h2>
      
      <div class="offer-grid">
          
          <div class="offer-item">
              <div class="icon-wrapper orange-icon-bg">
                  <div class="offer-icon computer-icon"></div>
              </div>
              <h3 class="offer-title">Multimodal Support</h3>
              <p class="offer-description">
                  Connect over chat, audio, video or in-person sessions.
              </p>
          </div>
          
          <div class="offer-item">
              <div class="icon-wrapper yellow-icon-bg">
                  <div class="offer-icon document-icon"></div>
              </div>
              <h3 class="offer-title">Self-Help Tools</h3>
              <p class="offer-description">
                  Access to 2000+ articles, videos and self-assessments.
              </p>
          </div>
          
          <div class="offer-item">
              <div class="icon-wrapper green-icon-bg">
                  <div class="offer-icon lightbulb-icon"></div>
              </div>
              <h3 class="offer-title">Online/Onsite Workshops</h3>
              <p class="offer-description">
                  Recurring awareness and group sessions online/onsite.
              </p>
          </div>

          <div class="offer-item">
              <div class="icon-wrapper blue-icon-bg">
                  <div class="offer-icon crown-icon"></div>
              </div>
              <h3 class="offer-title">Customised Programs</h3>
              <p class="offer-description">
                  On maternity, POSH, smoking cessation and 100+ other topics.
              </p>
          </div>

          <div class="offer-item">
              <div class="icon-wrapper purple-icon-bg">
                  <div class="offer-icon chart-icon"></div>
              </div>
              <h3 class="offer-title">In-Depth Analytics</h3>
              <p class="offer-description">
                  Quarterly anonymised report on usage and insights.
              </p>
          </div>
          
          </div>
      
      <button class="btn request-callback-btn" onclick="openModal()">REQUEST A CALLBACK</button>
  </section>
  <section class="testimonial-carousel-section">
    <h2 class="section-heading">
      Over 1 Million employees covered across companies
    </h2>

    <div class="carousel-container">
      <div class="carousel-track" id="testimonialTrack">

        <div class="carousel-slide">
          <div class="client-logo-wrapper">
            <img src="scientific_games_logo.png" class="client-logo">
          </div>
          <div class="testimonial-content">
            <p class="quote-text">
              We're a 1700 employee company and have had a great partnership with YourDOST...
            </p>
            <p class="client-signature">
              – Rency Mathew, Senior Director & Head of HR, Scientific Games
            </p>
          </div>
        </div>

        <div class="carousel-slide">
          <div class="client-logo-wrapper">
            <img src="company2.png" class="client-logo">
          </div>
          <div class="testimonial-content">
            <p class="quote-text">
              YourDOST helped us build a mentally resilient workforce across locations.
            </p>
            <p class="client-signature">
              – CHRO, Global Enterprise
            </p>
          </div>
        </div>

      </div>
    </div>

    <div class="carousel-pagination" id="carouselPagination"></div>
  </section>

  <section class="stories-carousel-section">
    <h2 class="stories-title">Stories Of Change</h2>

    <div class="stories-carousel-container">
      <div class="stories-track" id="storiesTrack">

        <!-- Slide 1 -->
        <div class="stories-slide">
          <div class="stories-card">
            <div class="stories-left">
              <img src="images/story-illustration.png" alt="User Illustration">
            </div>

            <div class="stories-right">
              <p class="stories-text">
                As someone who has used the YourDOST platform, I can say that it's
                of great help for everyone who seeks counseling. You don't
                necessarily have to suffer from mental health issues. Even if you
                just want to talk to someone to share something that’s been
                bothering you, it’s a great platform.
              </p>

              <p class="stories-author">
                – Chandrasekhar Dwivedi, Employee, UBS
              </p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="stories-slide">
          <div class="stories-card">
            <div class="stories-left">
              <img src="images/story-illustration.png" alt="User Illustration">
            </div>

            <div class="stories-right">
              <p class="stories-text">
                YourDOST helped me open up without fear of judgement. The
                counselors are empathetic, professional, and available when you
                need them the most.
              </p>

              <p class="stories-author">
                – Anonymous User
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="stories-dots" id="storiesDots"></div>
  </section>
  <section class="cta-section">
    <div class="cta-content">
      <h2>
        Break the stigma of Mental Health<br>
        <span>at YOUR workplace!</span>
      </h2>

      <button onclick="openModal()" class="open-modal-btn cta-btn">
        Request a Callback
      </button>
    </div>

    <!-- MODAL OVERLAY -->
  <div class="modal-overlay" id="callbackModal">
    <div class="modal">

      <!-- Close Button -->
      <button class="close-btn" onclick="closeModal()">×</button>

      <h2>Please fill the details requested below to request a callback</h2>

      <form>
        <div class="form-group">
          <input type="text" placeholder="Name" required />
        </div>

        <div class="form-group">
          <input type="tel" placeholder="Phone Number" required />
        </div>

        <div class="form-group">
          <input type="email" placeholder="Work Email" required />
        </div>

        <div class="form-group">
          <input type="text" placeholder="Your Organisation" />
        </div>

        <div class="form-group">
          <input type="text" placeholder="Your Role" />
        </div>

        <button type="submit" class="submit-btn" onclick="openModal()">
          REQUEST A CALLBACK
        </button>
      </form>

    </div>
  </div>
  <script>
    function openModal() {
      document.getElementById("callbackModal").style.display = "flex";
    }

    function closeModal() {
      document.getElementById("callbackModal").style.display = "none";
    }

    // Close modal on outside click
    window.addEventListener("click", function (e) {
      const modal = document.getElementById("callbackModal");
      if (e.target === modal) {
        closeModal();
      }
    });
  </script>

    <!-- Decorative trees -->
    <div class="trees left">
      <span class="tree t1"></span>
      <span class="tree t2"></span>
    </div>

    <div class="trees right">
      <span class="tree t3"></span>
      <span class="tree t4"></span>
    </div>
  </section>

<script>
(function () {
  const storiesTrack = document.getElementById("storiesTrack");
  const slides = document.querySelectorAll(".stories-slide");
  const dotsContainer = document.getElementById("storiesDots");

  let currentIndex = 0;

  slides.forEach((_, i) => {
    const dot = document.createElement("span");
    if (i === 0) dot.classList.add("active");
    dot.addEventListener("click", () => moveToSlide(i));
    dotsContainer.appendChild(dot);
  });

  const dots = dotsContainer.querySelectorAll("span");

  function moveToSlide(index) {
    currentIndex = index;
    storiesTrack.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");
  }

  setInterval(() => {
    currentIndex = (currentIndex + 1) % slides.length;
    moveToSlide(currentIndex);
  }, 6000);
})();
</script>



<script>
  const track = document.getElementById("testimonialTrack");
  const slides = document.querySelectorAll(".carousel-slide");
  const pagination = document.getElementById("carouselPagination");

  let index = 0;

  // Create dots
  slides.forEach((_, i) => {
    const dot = document.createElement("span");
    if (i === 0) dot.classList.add("active");
    dot.addEventListener("click", () => moveToSlide(i));
    pagination.appendChild(dot);
  });

  const dots = pagination.querySelectorAll("span");

  function moveToSlide(i) {
    index = i;
    track.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");
  }

  // Auto-slide (optional)
  setInterval(() => {
    index = (index + 1) % slides.length;
    moveToSlide(index);
  }, 5000);
</script>

</body>
@push('styles')
<link rel="stylesheet" href="{{ asset('css/eap.css') }}"/>
@endpush

@push('scripts')
<link rel="stylesheet" href="{{ asset('js/script.js') }}"/>
@endpush

@endsection