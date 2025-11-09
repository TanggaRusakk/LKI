@extends('layout.mainlayout')

@section('content')
<section class="hero wood-texture">
  <div class="hero-visual" style="background-image: url('{{ asset('images/hero-bg.jpg') }}')"></div>
  <div class="container hero-inner">
    <div class="row align-items-center">
         <div class="col-lg-8 mx-auto text-center">
           <h1 class="display-5">Lambang Karya Indah</h1>
           <p class="lead">Industrial wood processing — precision milling, sustainable sourcing, and trusted delivery.</p>
           <div class="hero-cta">
             <a href="{{ route('woods') }}" class="btn btn-light btn-cta-primary btn-radius-12">Our Woods</a>
             <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-cta-outline btn-radius-12">Services</a>
           </div>
         </div>
    </div>
  </div>
</section>

<section class="py-5 fade-up">
  <div class="container text-center">
  <h2 class="section-title">About Us</h2>
  <p class="mx-auto content-maxwidth">
      Established in 1998 by Mr. Sutrisno, Lambang Karya Indah (LKI) is a leading wood processing company
      that specializes in creating semi-finished wood materials. Our mission is to bring the warmth and strength
      of natural wood into every home and project.
    </p>
  </div>
</section>

<section class="py-5 fade-up">
  <div class="container">
    <h2 class="section-title">Why Choose Us</h2>
    <div class="wood-grid">
      <div class="card text-center p-3">
        <img src="images/high_precision.png" class="card-img-top">
        <div class="card-body">
          <h5 class="fw-bold text-success">High Precision</h5>
          <p>We process every piece with precision and attention to detail.</p>
        </div>
      </div>
      <div class="card text-center p-3">
        <img src="images/sustainable.png" class="card-img-top">
        <div class="card-body">
          <h5 class="fw-bold text-success">Sustainable</h5>
          <p>All woods are responsibly sourced, ensuring a greener planet.</p>
        </div>
      </div>
      <div class="card text-center p-3">
        <img src="images/experienced.png" class="card-img-top">
        <div class="card-body">
          <h5 class="fw-bold text-success">Experienced</h5>
          <p>Over 25 years of craftsmanship and trusted by many industries.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
