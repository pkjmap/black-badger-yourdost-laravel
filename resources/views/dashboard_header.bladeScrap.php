<header class="topbar">

    <!-- LOGO (left) -->
    <div class="logo">
        <img src="{{ asset('images/favicon.ico')}}" />
        <span><b>Your</b>DOST</span>
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
            <div class="avatar">P</div>
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