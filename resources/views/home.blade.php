@extends('layout.mainlayout')

@section('content')
<!-- Hero Section -->
<section class="hero d-flex align-items-center text-center text-light" style="background: url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat; height: 90vh;">
  <div class="container" data-aos="fade-up">
    <h1 class="fw-bold display-4">Welcome to Lambang Karya Indah</h1>
    <p class="lead mt-3">Crafting quality woodwork since 1998</p>
  </div>
</section>

<!-- About Section -->
<section class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center fw-bold mb-4 text-success">About Us</h2>
    <p class="text-center mx-auto" style="max-width: 700px;">
      Lambang Karya Indah (LKI) is a wood processing company established in 1998, owned by Mr. Sutrisno. 
      We specialize in transforming raw wood into semi-finished materials with precision and care.
    </p>
  </div>
</section>

<!-- Advantages -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center fw-bold mb-5 text-success">Why Choose Us</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm hover-scale">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-3">High Precision</h5>
            <p>Every cut, every polish — done with expert precision using modern machinery.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm hover-scale">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-3">Sustainable Materials</h5>
            <p>We only use responsibly sourced wood, supporting sustainability and quality.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm hover-scale">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-3">Experienced Craftsmen</h5>
            <p>Over 25 years of experience in delivering reliable, durable, and elegant woodworks.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
