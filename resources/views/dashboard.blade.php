@extends('layouts.app')
@section('content')
<div class="page">

    <!-- LEFT SIDEBAR -->
    <aside class="sidebar">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="sidebar-icon">
        <p class="sidebar-text">
            Get a dedicated voice / video session<br>
            with an expert for a more focussed<br>
            experience
        </p>
        <a href="#" class="sidebar-link">BOOK AN APPOINTMENT</a>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="content">

        <!-- MY EXPERTS -->
        <section class="card experts">
            <h3>My Experts</h3>

            <div class="experts-box">
                <div class="avatars">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg">
                </div>

                <div class="experts-text">
                    <h4>Begin your first session...</h4>
                    <p>
                        Chat right now with an expert on any topic you are seeking
                        answers for.
                    </p>
                    <span class="status">
                        <span class="dot"></span>
                        23 people are taking sessions
                    </span>
                </div>

                <a href="{{ route('talk.it.out') }}" class="experts-link">Explore Experts</a>
            </div>
        </section>

        <!-- FEELING SECTION -->
        <section class="card feelings">
            <h3>How are you feeling today?</h3>

            <div class="emoji-row">
                <div class="emoji">
                    😀<span>Happy</span>
                </div>
                <div class="emoji">
                    😰<span>Anxious</span>
                </div>
                <div class="emoji">
                    😡<span>Angry</span>
                </div>
                <div class="emoji">
                    😞<span>Demotivated</span>
                </div>
                <div class="emoji">
                    😐<span>Worthless</span>
                </div>
                <div class="emoji">
                    😢<span>Sad</span>
                </div>
            </div>
        </section>

        <!-- ANXIETY TEST -->
        <section class="card test">
            <div class="test-icon">💬</div>

            <div class="test-text">
                <span class="tag">SELF TEST</span>
                <h4>Anxiety Test</h4>
                <p>
                    Anxiety is an emotion of dread, fear and worry that something
                    will go wrong. Have you been feeling particularly anxious?
                    Why not check it?
                </p>
            </div>

            <a href="#" class="quiz-link">TAKE A QUIZ</a>
        </section>

    </main>
</div>
@endsection