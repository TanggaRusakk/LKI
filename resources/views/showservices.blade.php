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
                        class="btn btn-success btn-lg flex-grow-1 py-3 fw-semibold btn-radius-15"; target="_blank">
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
        <div class="card-header text-white py-4 navbar-custom">
            <h3 class="mb-0 fw-bold">Customer Reviews</h3>
        </div>
        <div class="card-body p-4">
            @auth
                @if(!Auth::user()->isAdmin())
                    <div class="card shadow-sm mb-4 card-rounded-15 review-input-bg">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Write a Review</h5>
                            <form method="POST" action="{{ route('reviews.store') }}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Rating</label>
                                    <div class="interactive-rating-stars d-flex gap-2 align-items-center">
                                        <input type="hidden" name="rating" id="rating-input" value="0">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="star-icon" data-rating="{{ $i }}" style="cursor: pointer; font-size: 2rem;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffc107" class="bi bi-star-fill star-filled" viewBox="0 0 16 16" style="display: none;">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c757d" class="bi bi-star star-empty" viewBox="0 0 16 16" style="display: inline-block;">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                                </svg>
                                            </span>
                                        @endfor
                                        <span id="rating-text" class="ms-2 text-muted fw-semibold">0/5</span>
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
                        <li><a class="dropdown-item {{ !request('rating') ? 'active' : '' }}" href="{{ route('services.show', ['id' => $service->id]) }}">All Ratings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{ request('rating') == '5' ? 'active' : '' }}" href="{{ route('services.show', ['id' => $service->id, 'rating' => 5]) }}">
                            5 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '4' ? 'active' : '' }}" href="{{ route('services.show', ['id' => $service->id, 'rating' => 4]) }}">
                            4 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '3' ? 'active' : '' }}" href="{{ route('services.show', ['id' => $service->id, 'rating' => 3]) }}">
                            3 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '2' ? 'active' : '' }}" href="{{ route('services.show', ['id' => $service->id, 'rating' => 2]) }}">
                            2 Stars
                        </a></li>
                        <li><a class="dropdown-item {{ request('rating') == '1' ? 'active' : '' }}" href="{{ route('services.show', ['id' => $service->id, 'rating' => 1]) }}">
                            1 Star
                        </a></li>
                    </ul>
                </div>
            </div>

            @forelse(isset($reviews) ? $reviews : $service->reviews as $review)
                <div class="review-card p-4 mb-3 shadow-sm border-0" style="border-left: 4px solid {{ $loop->iteration % 2 == 1 ? 'var(--medium-brown)' : 'var(--dark-brown)' }} !important;">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-center">
                            <div class="user-avatar me-3">
                                <img src="{{ $review->user->photo_url }}" 
                                     alt="{{ $review->user->name }}" 
                                     class="rounded-circle"
                                     style="width: 50px; height: 50px; object-fit: cover; border: 3px solid {{ $loop->iteration % 2 == 1 ? 'var(--medium-brown)' : 'var(--dark-brown)' }};">
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1" style="color: {{ $loop->iteration % 2 == 1 ? 'var(--dark-brown)' : 'var(--forest-green)' }};">{{ $review->user->name }}</h6>
                                <div class="mb-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffc107" class="bi bi-star-fill star-filled" viewBox="0 0 16 16" style="display: inline-block;">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c757d" class="bi bi-star star-empty" viewBox="0 0 16 16" style="display: inline-block;">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="text-muted ms-2">{{ $review->rating }}/5</span>
                                </div>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        
                        @auth
                            @if(Auth::id() === $review->user_id)
                                <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm text-white" style="background: {{ $loop->iteration % 2 == 1 ? 'linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%)' : '#4A6B3C' }}; border: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
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

<script>
// Interactive Rating Stars
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-icon');
    const ratingInput = document.getElementById('rating-input');
    const ratingText = document.getElementById('rating-text');
    
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            ratingInput.value = rating;
            ratingText.textContent = rating + '/5';
            updateStars(rating);
        });
        
        // Hover effect
        star.addEventListener('mouseenter', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            updateStars(rating);
        });
    });
    
    // Reset to selected rating on mouse leave
    const ratingContainer = document.querySelector('.interactive-rating-stars');
    ratingContainer.addEventListener('mouseleave', function() {
        const currentRating = parseInt(ratingInput.value);
        updateStars(currentRating);
    });
    
    function updateStars(rating) {
        stars.forEach(star => {
            const starRating = parseInt(star.getAttribute('data-rating'));
            const filledStar = star.querySelector('.star-filled');
            const emptyStar = star.querySelector('.star-empty');
            
            if (starRating <= rating) {
                filledStar.style.display = 'inline-block';
                emptyStar.style.display = 'none';
            } else {
                filledStar.style.display = 'none';
                emptyStar.style.display = 'inline-block';
            }
        });
    }
    
    // Initialize with default rating (0 = all empty)
    updateStars(0);
});
</script>
@endsection
