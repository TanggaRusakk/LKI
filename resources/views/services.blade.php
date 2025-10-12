@extends('layout.mainlayout')

@section('content')
<div class="container py-5 fade-up">
  <h2 class="section-title">Our Services</h2>
  <p class="text-center mb-5">Every service costs <strong>Rp 3.500.000 per m³</strong></p>

  <div class="service-grid">
    <div class="card text-center p-3">
      <div class="card-body">
        <h5 class="fw-bold text-success">Custom Cutting</h5>
        <p>Precision cutting tailored to your project.</p>
      </div>
    </div>
    <div class="card text-center p-3">
      <div class="card-body">
        <h5 class="fw-bold text-success">Finishing</h5>
        <p>Professional surface treatment for durability and aesthetics.</p>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card shadow-sm hover-scale">
        <div class="card-body text-center">
          <h5 class="fw-bold mb-3">Finishing & Drying</h5>
          <p>We provide wood finishing and drying services to maintain quality and durability.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="cta mt-5">
    <h4 class="fw-bold">Want to know more details?</h4>
    <p>Contact our consultant team for personalized solutions.</p>
    <div class="btn btn-light fw-bold">Chat via WhatsApp</div>
  </div>
</div>
@endsection
