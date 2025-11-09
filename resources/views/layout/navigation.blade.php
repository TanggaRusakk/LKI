<nav class="navbar navbar-expand-lg fixed-top navbar-custom">
  <div class="container">
    <a class="navbar-brand fw-bold text-light d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" width="48" height="48" class="me-2 logo-img" alt="Logo">
      <span class="brand-text">LKI</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- collapse: desktop links (lg+) + mobile panel (sm/md) --}}
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      {{-- Desktop nav (visible on lg and up) --}}
      <ul class="navbar-nav align-items-center d-none d-lg-flex">
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/woods') }}">Wood</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/services') }}">Service</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/contacts') }}">Contact</a></li>
        
        @auth
          {{-- User is logged in - Show profile dropdown --}}
          <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle text-light d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-4"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
              @if(!auth()->user()->isAdmin())
                <li><a class="dropdown-item" href="{{ route('reviews.index') }}">My Reviews</a></li>
              @endif
              @if(auth()->user()->isAdmin())
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Sign Out</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          {{-- User is not logged in - Show login/signup buttons --}}
          <li class="nav-item ms-3">
            <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm me-2">Sign in</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/register') }}" class="btn btn-outline-light btn-sm">Sign up</a>
          </li>
        @endauth
      </ul>

      {{-- Mobile panel for small screens --}}
      <div class="mobile-panel d-lg-none">
        {{-- center close X (also keep toggler available at top-right) --}}
        <button class="mobile-close d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Close">&times;</button>

        @auth
          {{-- Mobile: Show user menu when logged in --}}
          <div class="user-mobile-menu mb-4">
            <div class="d-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-person-circle text-light"></i>
            </div>
            <div class="d-flex flex-column gap-2">
              <a href="{{ route('profile') }}" class="text-light text-decoration-none">
                <i class="bi bi-person me-2"></i>My Profile
              </a>
              @if(!auth()->user()->isAdmin())
                <a href="{{ route('reviews.index') }}" class="text-light text-decoration-none">
                  <i class="bi bi-chat-left-text me-2"></i>My Reviews
                </a>
              @endif
              @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="text-light text-decoration-none">
                  <i class="bi bi-shield-check me-2"></i>Admin Dashboard
                </a>
              @endif
              <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm w-100">
                  <i class="bi bi-box-arrow-right me-2"></i>Sign Out
                </button>
              </form>
            </div>
          </div>
        @else
          {{-- Mobile: Show login/signup when not logged in --}}
          <div class="auth-actions mb-4">
            <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sign w-100 mb-2">Sign in</a>
            <a href="{{ url('/register') }}" class="btn btn-outline-light btn-sign w-100">Sign up</a>
          </div>
        @endauth

        <ul class="navbar-nav w-100">
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}" data-bs-toggle="collapse" data-bs-target="#navbarNav">Home</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/woods') }}" data-bs-toggle="collapse" data-bs-target="#navbarNav">Wood</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/services') }}" data-bs-toggle="collapse" data-bs-target="#navbarNav">Service</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/contacts') }}" data-bs-toggle="collapse" data-bs-target="#navbarNav">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
