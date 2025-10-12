@extends('layout.mainlayout')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center text-success fw-bold mb-5">Types of Wood We Handle</h2>
  <div class="row g-4">
    @foreach ([
      ['name'=>'Teak (Jati)','desc'=>'Durable and elegant wood with rich color, ideal for furniture.','img'=>'https://images.unsplash.com/photo-1565538810643-b5bdb714032a'],
      ['name'=>'Merbau','desc'=>'Hard tropical wood known for its reddish-brown hue and high strength.','img'=>'https://images.unsplash.com/photo-1578301978693-85fa9c0320e1'],
      ['name'=>'Pine','desc'=>'Light-colored softwood used widely for interior design and flooring.','img'=>'https://images.unsplash.com/photo-1621121813613-b6d88173d02d']
    ] as $wood)
    <div class="col-md-4">
      <div class="card shadow-sm hover-scale">
        <img src="{{ $wood['img'] }}" class="card-img-top" alt="{{ $wood['name'] }}">
        <div class="card-body text-center">
          <h5 class="fw-bold">{{ $wood['name'] }}</h5>
          <p>{{ $wood['desc'] }}</p>
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
