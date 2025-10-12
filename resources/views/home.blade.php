@extends('layout.mainlayout')

@section('content')
<section class="hero">
  <div class="container">
    <h1>Lambang Karya Indah</h1>
    <p>Crafting quality wood products since 1998</p>
  </div>
</section>

<section class="py-5 fade-up">
  <div class="container text-center">
    <h2 class="section-title">About Us</h2>
    <p class="mx-auto" style="max-width: 700px;">
      Established in 1998 by Mr. Sutrisno, Lambang Karya Indah (LKI) is a leading wood processing company
      that specializes in creating semi-finished wood materials. Our mission is to bring the warmth and strength
      of natural wood into every home and project.
    </p>
  </div>
</section>

<section class="py-5 bg-light fade-up">
  <div class="container">
    <h2 class="section-title">Why Choose Us</h2>
    <div class="wood-grid">
      <div class="card text-center p-3">
        <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4" class="card-img-top">
        <div class="card-body">
          <h5 class="fw-bold text-success">High Precision</h5>
          <p>We process every piece with precision and attention to detail.</p>
        </div>
      </div>
      <div class="card text-center p-3">
        <img src="https://images.unsplash.com/photo-1616628182502-47e4ec7a0e03" class="card-img-top">
        <div class="card-body">
          <h5 class="fw-bold text-success">Sustainable</h5>
          <p>All woods are responsibly sourced, ensuring a greener planet.</p>
        </div>
      </div>
      <div class="card text-center p-3">
        <img src="https://images.unsplash.com/photo-1565538810643-b5bdb714032a" class="card-img-top">
        <div class="card-body">
          <h5 class="fw-bold text-success">Experienced</h5>
          <p>Over 25 years of craftsmanship and trusted by many industries.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
