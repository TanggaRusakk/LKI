@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="fw-bold mb-4">Welcome, {{ auth()->user()->name }}! 👋</h2>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">My Profile</h5>
                            <p class="text-muted small">View and edit your profile information</p>
                            <a href="{{ route('profile') }}" class="btn btn-outline-success">Go to Profile</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-chat-left-text fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">My Reviews</h5>
                            <p class="text-muted small">Manage your reviews and feedback</p>
                            <a href="{{ route('reviews.index') }}" class="btn btn-outline-success">View Reviews</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Browse Woods</h5>
                            <p class="text-muted small">Explore our wood collection</p>
                            <a href="{{ route('woods') }}" class="btn btn-outline-success">Browse Woods</a>
                        </div>
                    </div>
                </div>
            </div>

            @if(auth()->user()->isAdmin())
            <div class="mt-5">
                <h4 class="fw-bold mb-3">Admin Tools</h4>
                <div class="card shadow-sm border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="fw-bold mb-1">Admin Dashboard</h5>
                                <p class="text-muted mb-0">Manage users, woods, and services</p>
                            </div>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success">
                                <i class="bi bi-gear-fill"></i> Admin Panel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
