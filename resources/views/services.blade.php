@extends('layout.mainlayout')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center text-success fw-bold mb-4">Our Services</h2>
  <p class="text-center mb-5">Professional wood processing services with precision and trust.</p>

  <div class="row g-4 justify-content-center">
    @foreach ([
      ['name'=>'Custom Wood Cutting','desc'=>'High precision cutting based on your project needs.','price'=>'Rp 3.500.000/m³'],
      ['name'=>'Kiln Drying','desc'=>'Ensures your wood is dry and ready for use, preventing warping.','price'=>'Rp 3.500.000/m³'],
      ['name'=>'Finishing & Coating','desc'=>'Enhancing wood durability and natural beauty.','price'=>'Rp 3.500.000/m³']
    ] as $service)
    <div class="col-md-4">
      <div class="card shadow-sm hover-scale h-100">
        <div class="card-body text-center">
          <h5 class="fw-bold text-success">{{ $service['name'] }}</h5>
          <p>{{ $service['desc'] }}</p>
          <span class="badge bg-success mb-2">{{ $service['price'] }}</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- CTA Section --}}
  <div class="mt-5 text-center bg-success text-light rounded-4 p-4 shadow-lg" data-aos="zoom-in">
    <h4 class="fw-bold">Need a Custom Consultation?</h4>
    <p class="mb-3">Discuss your wood project directly with our expert team.</p>
    <a href="https://wa.me/6281234567890" class="btn btn-light fw-bold px-4 py-2">Chat via WhatsApp</a>
  </div>
</div>
@endsection
