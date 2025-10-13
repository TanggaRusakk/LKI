<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-success d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" width="50" height="50" class="me-2" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/woods') }}">Wood</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Service</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/contacts') }}">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
