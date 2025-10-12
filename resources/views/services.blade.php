@extends('layout.mainlayout')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center text-success fw-bold mb-4">Our Services</h2>
  <p class="text-center mb-5">We offer top-notch wood processing services at <strong>Rp 3.500.000 per m³</strong>.</p>

  <div class="row justify-content-center g-4">
    <div class="col-md-5">
      <div class="card shadow-sm hover-scale">
        <div class="card-body text-center">
          <h5 class="fw-bold mb-3">Custom Wood Cutting</h5>
          <p>We cut woods precisely according to your specifications and dimensions.</p>
        </div>
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
</div>
@endsection
