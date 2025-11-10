@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="fw-bold mb-4">Welcome, {{ auth()->user()->name }}! 👋</h2>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                            <h5 class="fw-bold mb-0">My Profile</h5>
                        </div>
                        <div class="card-body text-center">
                            <p class="text-muted small">View and edit your profile information</p>
                            <a href="{{ route('profile') }}" class="btn text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: none;">Go to Profile</a>
                        </div>
                    </div>
                </div>
                
                @if(!auth()->user()->isAdmin())
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header text-white text-center" style="background: #4A6B3C;">
                            <h5 class="fw-bold mb-0">My Reviews</h5>
                        </div>
                        <div class="card-body text-center">
                            <p class="text-muted small">Manage your reviews and feedback</p>
                            <a href="{{ route('reviews.index') }}" class="btn text-white" style="background: #4A6B3C; border: none;">View Reviews</a>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                            <h5 class="fw-bold mb-0">Browse Woods</h5>
                        </div>
                        <div class="card-body text-center">
                            <p class="text-muted small">Explore our wood collection</p>
                            <a href="{{ route('woods') }}" class="btn text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: none;">Browse Woods</a>
                        </div>
                    </div>
                </div>
            </div>

            @if(auth()->user()->isAdmin())
            <div class="mt-5">
                <h4 class="fw-bold mb-3">Admin Tools</h4>
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white" style="background: #4A6B3C;">
                        <h5 class="fw-bold mb-0">Admin Dashboard</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="text-muted mb-0">Manage users, woods, and services</p>
                            <a href="{{ route('admin.dashboard') }}" class="btn text-white" style="background: #4A6B3C; border: none;">
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