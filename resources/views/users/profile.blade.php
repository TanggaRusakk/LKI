@extends('layout.mainlayout')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0 card-rounded-20">
                <div class="card-header text-white py-4 card-header-gradient-blue">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-circle fa-3x me-3"></i>
                        <div>
                            <h3 class="mb-0 fw-bold">User Profile</h3>
                            <small>Manage your account information</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="fas fa-user me-2 text-primary"></i>Full Name
                            </label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" 
                                   placeholder="Enter your full name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-2 text-primary"></i>Email Address
                            </label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $user->email) }}" 
                                   placeholder="Enter your email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-shield-alt me-2 text-primary"></i>Account Role
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg bg-light" 
                                           value="{{ ucfirst($user->role) }}" readonly>
                                <span class="input-group-text">
                                    @if($user->isAdmin())
                                        <span class="badge bg-warning">Admin</span>
                                    @else
                                        <span class="badge bg-primary">User</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>Member Since
                            </label>
                <input type="text" class="form-control form-control-lg bg-light" 
                    value="{{ $user->created_at->format('F d, Y') }}" readonly>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold btn-radius-12 btn-gradient-primary borderless">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- User Reviews Section -->
            <div class="card shadow-lg border-0 mt-4 card-rounded-20">
                <div class="card-header text-white py-4 card-header-gradient-green">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-star me-2"></i>My Reviews</h4>
                </div>
                <div class="card-body p-4">
                    @if($user->reviews->count() > 0)
                        @foreach($user->reviews as $review)
                            <div class="review-card p-4 mb-3 shadow-sm">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <div class="mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-warning"></i>
                                                @endif
                                            @endfor
                                            <span class="text-muted ms-2">{{ $review->rating }}/5</span>
                                        </div>
                                        <p class="mb-1 fw-semibold">
                                            @if($review->wood_id)
                                                <i class="fas fa-tree me-2 text-success"></i>{{ $review->wood->name }}
                                            @elseif($review->service_id)
                                                <i class="fas fa-tools me-2 text-primary"></i>{{ $review->service->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-0">{{ $review->comment }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                            <p class="text-muted">You haven't written any reviews yet.</p>
                            <a href="{{ route('woods') }}" class="btn btn-primary">Browse Woods</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- view-level styles moved to public/style/styles.css -->
@endsection
