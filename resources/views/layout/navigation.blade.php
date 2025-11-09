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
      </ul>

      {{-- Mobile panel for small screens --}}
      <div class="mobile-panel d-lg-none w-100">
        {{-- center close X (also keep toggler available at top-right) --}}
        <button class="mobile-close d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Close">&times;</button>

        <div class="auth-actions d-flex justify-content-center gap-3 mb-3">
          <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sign">Sign in</a>
          <a href="{{ url('/register') }}" class="btn btn-outline-light btn-sign">Sign up</a>
        </div>

        <ul class="navbar-nav align-items-start w-100">
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/woods') }}">Wood</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/services') }}">Service</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/contacts') }}">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
