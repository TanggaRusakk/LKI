@extends('layout.mainlayout')

@section('content')
<div class="container py-5 fade-up">
  <h2 class="section-title">Our Wood Collection</h2>
  
  <h4 class="fw-bold mb-3 text-success">Local Woods</h4>
  <div class="wood-grid mb-5">
    @foreach([
      ['name'=>'Jati','price'=>'Rp 5.000.000/m³','use'=>'Furniture, Flooring','desc'=>'Strong and termite-resistant.','img'=>'https://images.unsplash.com/photo-1603190287605-e6ade32fa852'],
      ['name'=>'Merbau','price'=>'Rp 4.800.000/m³','use'=>'Decking, Frames','desc'=>'Dense with rich reddish tones.','img'=>'https://images.unsplash.com/photo-1616628182502-47e4ec7a0e03']
    ] as $w)
      <div class="card">
        <img src="{{ $w['img'] }}" alt="{{ $w['name'] }}">
        <div class="card-body">
          <h5 class="fw-bold text-success">{{ $w['name'] }}</h5>
          <p>{{ $w['desc'] }}</p>
          <p><strong>Best for:</strong> {{ $w['use'] }}</p>
          <span class="badge bg-success">{{ $w['price'] }}</span>
        </div>
      </div>
    @endforeach
  </div>

  <h4 class="fw-bold mb-3 text-success">Imported Woods</h4>
  <div class="wood-grid">
    @foreach([
      ['name'=>'Oak','price'=>'Rp 6.500.000/m³','use'=>'Luxury furniture','desc'=>'Dense wood with fine grain.','img'=>'https://images.unsplash.com/photo-1565538810643-b5bdb714032a'],
      ['name'=>'Walnut','price'=>'Rp 7.200.000/m³','use'=>'Interior panels','desc'=>'Dark tone, premium texture.','img'=>'https://images.unsplash.com/photo-1616628182077-915d4793055b']
    ] as $w)
      <div class="card">
        <img src="{{ $w['img'] }}" alt="{{ $w['name'] }}">
        <div class="card-body">
          <h5 class="fw-bold text-success">{{ $w['name'] }}</h5>
          <p>{{ $w['desc'] }}</p>
          <p><strong>Best for:</strong> {{ $w['use'] }}</p>
          <span class="badge bg-success">{{ $w['price'] }}</span>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
