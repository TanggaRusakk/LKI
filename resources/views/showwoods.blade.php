@extends('layout.mainlayout')

@section('content')
<div class="container py-5 fade-in">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ asset($wood->image) }}" class="img-fluid h-100 object-fit-cover" alt="{{ $wood->name }}">
            </div>
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                <h2 class="fw-bold text-success mb-3">{{ $wood->name }}</h2>
                <p class="text-muted mb-1"><strong>Asal:</strong> {{ $wood->origin }}</p>
                <hr class="border-success opacity-75" style="width: 80px;">
                <p><strong>Description:</strong><br>{{ $wood->description }}</p>
                <p><strong>Characteristics:</strong><br>{{ $wood->characteristics }}</p>
                <p><strong>Uses:</strong><br>{{ $wood->uses }}</p>

                <a href="{{ route('woods') }}" class="btn btn-success mt-3 rounded-pill px-4 py-2 fw-semibold">
                    ← Back to Woods List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
