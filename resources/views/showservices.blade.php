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
                <h1 class="fw-bold mb-3 gradient-text-blue">
                    {{ $service->name }}
                </h1>
                
                <div class="mb-4">
                    <h5 class="fw-bold text-primary"><i class="fas fa-info-circle me-2"></i>Description</h5>
                    <p class="text-muted">{{ $service->description }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-success"><i class="fas fa-tag me-2"></i>Price</h5>
                    <h3 class="text-success">Rp {{ number_format($service->price, 0, ',', '.') }}/m³</h3>
                </div>

                <div class="d-flex gap-2">
                    <a href="https://wa.me/628123235655?text=Halo%20saya%20ingin%20konsultasi%20tentang%20layanan%20{{ urlencode($service->name) }}" 
                        class="btn btn-success btn-lg flex-grow-1 py-3 fw-semibold btn-radius-15">
                        <i class="fab fa-whatsapp me-2"></i>Consult via WhatsApp
                    </a>
                </div>
                <a href="{{ route('services.index') }}" class="btn btn-primary mt-3 px-4 py-3 fw-semibold btn-radius-15">
                    <i class="fas fa-arrow-left me-2"></i>Back to Services
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
                                    <label for="comment" class="form-label fw-semibold">Your Review</label>
                                    <textarea class="form-control @error('comment') is-invalid @enderror" 
                                              id="comment" name="comment" rows="4" 
                                              placeholder="Share your experience with this service..." required></textarea>
                                    @error('comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-warning fw-bold px-4 btn-radius-12">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Review
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>Admins cannot leave reviews.
                    </div>
                @endif
            @else
                <div class="alert alert-warning">
                    <i class="fas fa-sign-in-alt me-2"></i>Please <a href="{{ route('login') }}" class="alert-link">login</a> to leave a review.
                </div>
            @endauth

            <h5 class="fw-bold mb-4 mt-4">
                <i class="fas fa-comments me-2"></i>All Reviews ({{ $service->reviews->count() }})
            </h5>

            @forelse($service->reviews as $review)
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
                            @if(Auth::id() === $review->user_id || Auth::user()->isAdmin())
                <button type="button" class="btn btn-danger btn-sm rounded-8" 
                    data-bs-toggle="modal" 
                    data-bs-target="#deleteReviewModal{{ $review->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <!-- Delete Review Modal -->
                                <div class="modal fade modal-rounded-15" id="deleteReviewModal{{ $review->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Delete Review</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this review?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        </div>
    </div>
</div>

<!-- view-level styles moved to public/style/styles.css -->
@endsection
