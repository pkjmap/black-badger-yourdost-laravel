@extends('layouts.app')
@section('content')
<section class="discussion-section">
  <div class="container">

    <!-- LEFT -->
    <div class="live-count">
      <span class="dot"></span>
      <span>23 people are currently seeking help</span>
    </div>

    <!-- RIGHT -->
    <div class="right-content">
      <h1 class="title">
        What do <span>you</span> want to discuss about?
      </h1>

      <div class="topics">
        <button class="topic-btn">❤️ Relationship</button>
        <button class="topic-btn">📘 Career</button>
        <button class="topic-btn">⚧ Sexual Wellness</button>
        <button class="topic-btn">▶ Self Improvement</button>
        <button class="topic-btn">👥 Academic</button>
        <button class="topic-btn">⚡ Psychological Disorders</button>
        <button class="topic-btn">⚧ LGBTQIA+</button>
      </div>
    </div>

  </div>
</section>
<div class="search-filter-bar">
  <!-- Left vertical filter -->
  <div class="filter-tab">Filter</div>

  <!-- Center search -->
  <div class="search-box">
    <span class="search-icon">🔍</span>
    <input
      type="text"
      name="search"
      placeholder="Search by expert name" />
  </div>

  <!-- Right sort -->
  <div class="sort-options">
    <span class="label">Sort by :</span>
    <a href="#" data-sort="rating">Rating</a>
    <a href="#" data-sort="availability">Appointment Availability</a>
  </div>
</div>
<div class="experts-grid">

  <!-- CARD -->
  <!-- <div class="expert-card">
    <div class="card-body">
      <div class="profile">
        <div class="avatar">
          <img src="https://via.placeholder.com/80" alt="Expert">
          <span class="status online"></span>
        </div>

        <div class="info">
          <h3>Anjali Jain</h3>
          <p class="role">Clinical Psychologist</p>

          <div class="rating">
            ★★★★★ <span>(4.8)</span>
          </div>

          <p class="convo">Conversations: 8332</p>
        </div>
      </div>

      <div class="details">
        <p>📅 <strong>Next Available Appointment:</strong> Mon, 5th, Jan</p>
        <p>🕒 <strong>Chat schedule:</strong> Wed, 01 PM - 03 PM</p>
        <a href="#" class="see-more">See More &gt;</a>
      </div>
    </div>

    <div class="card-footer">
      <button>CHAT</button>
      <button>MESSAGE</button>
      <button>APPOINTMENT</button>
    </div>
  </div>

  <div class="expert-card">
    <div class="card-body">
      <div class="profile">
        <div class="avatar">
          <img src="https://via.placeholder.com/80" alt="Expert">
          <span class="status online"></span>
        </div>

        <div class="info">
          <h3>Pooja Mohan Shinde</h3>
          <p class="role">Psychologist</p>

          <div class="rating">
            ★★★★★ <span>(4.7)</span>
          </div>

          <p class="convo">Conversations: 460</p>
        </div>
      </div>

      <div class="details">
        <p>📅 <strong>Next Available Appointment:</strong> Tomorrow</p>
        <p>🕒 <strong>Chat schedule:</strong> Wed, 05 PM - 07 PM</p>
        <a href="#" class="see-more">See More &gt;</a>
      </div>
    </div>

    <div class="card-footer">
      <button>CHAT</button>
      <button>MESSAGE</button>
      <button>APPOINTMENT</button>
    </div>
  </div> -->

</div>
<div class="divider-wrapper">
  <div class="divider-line"></div>

  <div class="scroll-btn">
    ⌄
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {

    let page = 1;
    let search = '';
    let sort = ''; // rating | availability
    let debounceTimer = null;

    const expertsGrid = document.querySelector('.experts-grid');
    const scrollBtn = document.querySelector('.scroll-btn');
    const searchInput = document.querySelector('input[name="search"]');
    const sortLinks = document.querySelectorAll('.sort-options a');

    function loadExperts(reset = false) {
      if (reset) {
        page = 1;
        expertsGrid.innerHTML = '';
        scrollBtn.style.display = 'block';
      }

      const params = new URLSearchParams({
        page,
        search,
        sort
      });

      fetch("{{ route('load.more.experts') }}?" + params.toString(), {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
          }
        })
        .then(res => res.json())
        .then(data => {
          if (data.html && data.html.trim() !== '') {
            expertsGrid.insertAdjacentHTML('beforeend', data.html);
            page++;
          } else {
            scrollBtn.style.display = 'none';
          }
        })
        .catch(console.error);
    }

    /* ---------- INITIAL LOAD ---------- */
    loadExperts();

    /* ---------- LOAD MORE ---------- */
    scrollBtn.addEventListener('click', () => {
      loadExperts();
    });

    /* ---------- SEARCH (300ms DEBOUNCE) ---------- */
    searchInput.addEventListener('input', (e) => {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => {
        search = e.target.value.trim();
        loadExperts(true);
      }, 300);
    });

    /* ---------- SORT ---------- */
    sortLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();

        // UI active state
        sortLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');

        sort = link.dataset.sort;
        loadExperts(true);
      });
    });

  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('scheduleModal');
    const modalContent = document.getElementById('modalContent');
    const expertNameEl = document.getElementById('expertName');
    const expertsGrid = document.querySelector('.experts-grid');

    // 🔹 EVENT DELEGATION
    expertsGrid.addEventListener('click', (e) => {
      const link = e.target.closest('.see-more');
      if (!link) return;

      e.preventDefault();

      const expertId = link.dataset.id;
      const expertName = link.closest('.expert-card')
        .querySelector('h3').innerText;

      expertNameEl.innerText = expertName;
      modal.style.display = 'flex';
      modalContent.innerHTML = '<p>Loading...</p>';

      fetch(`./experts/${expertId}/schedule`, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(res => res.text())
        .then(html => modalContent.innerHTML = html)
        .catch(() => modalContent.innerHTML = 'Failed to load schedule');
    });

    // 🔹 Close modal
    modal.addEventListener('click', (e) => {
      if (
        e.target.classList.contains('modal-overlay') ||
        e.target.classList.contains('modal-close') ||
        e.target.classList.contains('close-btn')
      ) {
        modal.style.display = 'none';
      }
    });

  });
</script>




<div id="scheduleModal" class="modal-overlay">
  <div class="modal-box">
    <button class="modal-close">&times;</button>

    <h3 class="modal-title">
      🕒 <span id="expertName">Expert</span>'s Schedule
    </h3>

    <div id="modalContent">
      <p>Loading...</p>
    </div>

    <div class="modal-footer">
      <button class="close-btn">CLOSE</button>
    </div>
  </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/talk_it_out.css') }}">
@endpush