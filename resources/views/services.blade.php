@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5 fade-in section-title">Our Services</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4 fade-up">
        @foreach($services as $service)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm service-card service-card-bg">
                <img src="{{ asset($service->image) }}" class="card-img-top img-fit-cover-180" alt="{{ $service->name }}">
                <div class="card-body text-center">
                    <h5 class="fw-bold title-walnut">{{ $service->name }}</h5>
                    <p class="text-muted small">{{ Str::limit($service->description, 120) }}</p>
                    <p class="fw-semibold text-dark mb-3">Price: <span class="price-dark">Rp {{ number_format($service->price, 0, ',', '.') }}/m³</span></p>
                    <a href="{{ route('services.show', $service->id) }}" 
                        class="btn btn-primary px-4 py-2 fw-semibold btn-radius-12">
                        View More
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="alert alert-success mt-5 fade-in text-center alert-rounded-20">
        <strong>Want to Know More About Our Services?</strong><br>
        Click "View More"
    </div>
</div>
@endsection
