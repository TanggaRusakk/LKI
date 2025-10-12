@extends('layout.mainlayout')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center text-success fw-bold mb-5">Types of Wood We Handle</h2>
  <div class="row g-4">
    @foreach ($woods as $wood)
    <div class="col-md-4">
      <div class="card shadow-sm hover-scale">
        <img src="{{ $wood->image }}" class="card-img-top" alt="{{ $wood->name }}">
        <div class="card-body text-center">
          <h5 class="fw-bold">{{ $wood->name }}</h5>
          <p>{{ $wood->description }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
