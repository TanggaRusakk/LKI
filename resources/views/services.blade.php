@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5 fade-in">Our Services</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4 fade-up">
        @foreach($services as $service)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm service-card">
                <img src="{{ asset($service->image) }}" class="card-img-top rounded-top" alt="{{ $service->name }}">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-success">{{ $service->name }}</h5>
                    <p class="text-muted small">{{ $service->description }}</p>
                    <p class="fw-semibold text-dark mb-3">Price: <span class="text-success">Rp {{ number_format($service->price, 0, ',', '.') }}/m³</span></p>
                    <a href="https://wa.me/628123235655?text=Halo%20saya%20ingin%20konsultasi%20tentang%20layanan%20{{ urlencode($service->name) }}" 
                        class="btn btn-outline-success rounded-pill px-4 py-2 fw-semibold">
                        Consultation via WhatsApp
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="alert alert-success mt-5 fade-in text-center" style="border-radius: 20px;">
        <strong>Want to Know More About Our Services?</strong><br>
        Consult your needs directly through our WhatsApp using the button above.
    </div>
</div>
@endsection
