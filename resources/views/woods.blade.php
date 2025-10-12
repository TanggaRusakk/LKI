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
    </div>
    @endforeach
  </div>
</div>
@endsection
