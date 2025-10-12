@extends('layout.mainlayout')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center text-success fw-bold mb-4">Our Services</h2>
  <p class="text-center mb-5">We offer top-notch wood processing services at <strong>Rp 3.500.000 per m³</strong>.</p>

  <div class="row justify-content-center g-4">
    @foreach ($services as $service)
    <div class="col-md-5">
      <div class="card shadow-sm hover-scale">
        <div class="card-body text-center">
          <h5 class="fw-bold mb-3">{{ $service->name }}</h5>
          <p>{{ $service->description }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
