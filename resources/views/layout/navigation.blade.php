<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-success" href="{{ url('/') }}">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Tree_font_awesome.svg/1024px-Tree_font_awesome.svg.png" width="30" class="me-2">
      LKI - Lambang Karya Indah
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
