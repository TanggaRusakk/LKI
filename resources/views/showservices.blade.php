@extends('layout.mainlayout')

@section('content')
<div class="container py-5 fade-in page-container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ asset($service->image) }}" class="img-fluid page-hero-img-min500 object-fit-cover" alt="{{ $service->name }}">
            </div>
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                <h1 class="fw-bold mb-3 service-name">
                    {{ $service->name }}
                </h1>
                
                <div class="mb-4">
                    <h5 class="fw-bold service-desc-title">Description</h5>
                    <p class="text-muted">{{ $service->description }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-success">Price</h5>
                    <h3 class="text-success">Rp {{ number_format($service->price, 0, ',', '.') }}/m³</h3>
                </div>

                <div class="d-flex gap-2">
                    <a href="https://wa.me/628123235655?text=Halo%20saya%20ingin%20konsultasi%20tentang%20layanan%20{{ urlencode($service->name) }}" 
                        class="btn btn-success btn-lg flex-grow-1 py-3 fw-semibold btn-radius-15">
                        Consult via WhatsApp
                    </a>
                </div>
                <a href="{{ route('services.index') }}" class="btn btn-primary mt-3 px-4 py-3 fw-semibold btn-radius-15">
                   ← Back to Services
                </a>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-header text-white py-4 card-header-gradient-warning">
            <h3 class="mb-0 fw-bold"><i class="fas fa-star me-2"></i>Customer Reviews</h3>
        </div>
        <div class="card-body p-4">
            @auth
                @if(!Auth::user()->isAdmin())
                    <div class="card shadow-sm mb-4 card-rounded-15 review-input-bg">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><i class="fas fa-pen me-2"></i>Write a Review</h5>
                            <form method="POST" action="{{ route('reviews.store') }}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                
                                <div class="mb-3">
                                        <label class="form-label fw-semibold">Rating</label>
                                    <div class="rating-stars">
                                        @for($i = 5; $i >= 1; $i--)
                                            <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                            <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                                        @endfor
                                    </div>
                                </div>

                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-semibold">Title (optional)</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Short title for your review (optional)">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                <div class="mb-3">
                                    <label for="comment" class="form-label fw-semibold">Your Review</label>
                                    <textarea class="form-control @error('comment') is-invalid @enderror" 
                                              id="comment" name="comment" rows="4" 
                                              placeholder="Share your experience with this service..." required></textarea>
                                    @error('comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-warning fw-bold px-4 btn-radius-12">
                                    Submit Review
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        Admins cannot leave reviews.
                    </div>
                @endif
            @else
                <div class="alert alert-warning">
                    Please <a href="{{ route('login') }}" class="alert-link">login</a> to leave a review.
                </div>
            @endauth

            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                <h5 class="fw-bold mb-0">
                    Customer Reviews ({{ isset($reviews) ? $reviews->total() : $service->reviews->count() }})
                </h5>
                
                <!-- Rating Filter -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="ratingFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-filter me-2"></i>
                        @if(request('rating'))
                            {{ request('rating') }} Stars
                        @else
                            All Ratings
                        @endif
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="ratingFilterDropdown">
                        <li><a class="dropdown-item {{ !request('rating') ? 'active' : '' }}" href="{{ route('services.show', $service->id) }}">All Ratings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{ request('rating') == '5' ? 'active' : '' }}" href="{{ route('services.show', ['service' => $service->id, 'rating' => 5]) }}">
                            <i class="fas fa-star text-warning"></i> 5 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '4' ? 'active' : '' }}" href="{{ route('services.show', ['service' => $service->id, 'rating' => 4]) }}">
                            <i class="fas fa-star text-warning"></i> 4 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '3' ? 'active' : '' }}" href="{{ route('services.show', ['service' => $service->id, 'rating' => 3]) }}">
                            <i class="fas fa-star text-warning"></i> 3 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '2' ? 'active' : '' }}" href="{{ route('services.show', ['service' => $service->id, 'rating' => 2]) }}">
                            <i class="fas fa-star text-warning"></i> 2 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '1' ? 'active' : '' }}" href="{{ route('services.show', ['service' => $service->id, 'rating' => 1]) }}">
                            <i class="fas fa-star text-warning"></i> 1 Star
                        </a></li>
                    </ul>
                </div>
            </div>

            @forelse(isset($reviews) ? $reviews : $service->reviews as $review)
                <div class="review-card p-4 mb-3 shadow-sm review-card-accent">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-center">
                            <div class="user-avatar me-3">
                                <i class="fas fa-user-circle fa-3x text-primary"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ $review->user->name }}</h6>
                                <div class="mb-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted ms-2">{{ $review->rating }}/5</span>
                                </div>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        
                        @auth
                            {{-- Only the review owner can delete their review; admins cannot delete other users' reviews --}}
                            @if(Auth::id() === $review->user_id)
                                <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-8">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-comment-slash fa-4x text-muted mb-3"></i>
                    <p class="text-muted">No reviews yet. Be the first to review this service!</p>
                </div>
            @endforelse

            {{-- Pagination links for reviews (only shown when using pagination) --}}
            @if(isset($reviews) && $reviews->hasPages())
                <div class="mt-4 d-flex flex-column align-items-center">
                    <div class="d-flex justify-content-center w-100 no-pagination-summary">
                        {{ $reviews->links() }}
                    </div>
                    <div class="text-muted small mt-2">
                        @if($reviews->total() > 0)
                            Showing {{ $reviews->firstItem() }} to {{ $reviews->lastItem() }} of {{ $reviews->total() }} results
                        @else
                            Showing 0 results
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- view-level styles moved to public/style/styles.css -->
@endsection
