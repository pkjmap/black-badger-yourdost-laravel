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
      placeholder="Search by expert name" />
  </div>

  <!-- Right sort -->
  <div class="sort-options">
    <span class="label">Sort by :</span>
    <a href="#">Rating</a>
    <a href="#">Appointment Availability</a>
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

    let page = 1; // start from page 1

    function loadExperts() {
      fetch("{{ route('load.more.experts') }}?page=" + page, {
          method: 'GET',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);

          if (data.html) {
            document.querySelector('.experts-grid').insertAdjacentHTML(
              'beforeend',
              data.html
            );
            page++; // increment page number for next request
          } else {
            // Optional: disable button if no more data
            document.querySelector('.scroll-btn').disabled = true;
            //document.querySelector('.scroll-btn').innerText = 'No more experts';
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    // Call on page load
    loadExperts();

    // Call on button click
    document.querySelector('.scroll-btn').addEventListener('click', function() {
      loadExperts();
    });

  });
</script>


@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/talk_it_out.css') }}">
@endpush