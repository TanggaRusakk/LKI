@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5 fade-in">Wood Types That We Usually Handle</h2>

    {{-- Kayu Lokal --}}
    <section class="mb-5 fade-up">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <hr class="flex-grow-1 ms-3 border-2 border-success opacity-50">
        </div>
        <div class="row gy-4">
            @foreach($woods->where('origin', 'Indonesia') as $wood)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 wood-card">
                    <img src="{{ asset($wood->image) }}" class="card-img-top rounded-top" alt="{{ $wood->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold text-success">{{ $wood->name }}</h5>
                        <p class="text-muted small flex-grow-1">{{ Str::limit($wood->description, 120) }}</p>
                        <a href="{{ route('woods.show', $wood->id) }}" 
                            class="btn btn-outline-success rounded-pill mt-3">View More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Kayu Impor --}}
    <section class="fade-up">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <hr class="flex-grow-1 ms-3 border-2 border-success opacity-50">
        </div>
        <div class="row gy-4">
            @foreach($woods->where('origin', '!=', 'Indonesia') as $wood)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 wood-card">
                    <img src="{{ asset($wood->image) }}" class="card-img-top rounded-top" alt="{{ $wood->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold text-success">{{ $wood->name }}</h5>
                        <p class="text-muted small flex-grow-1">{{ Str::limit($wood->description, 120) }}</p>
                        <a href="{{ route('woods.show', $wood->id) }}" 
                            class="btn btn-outline-success rounded-pill mt-3">View More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
