@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"><i class="bi bi-chat-square-text-fill text-warning me-2"></i>Reviews Management</h2>
            <p class="text-muted mb-0">Moderate and manage all user reviews</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-warning text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Total Reviews</h6>
                    <h2 class="fw-bold mb-0">{{ $reviews->total() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-success text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">5 Star Reviews</h6>
                    <h2 class="fw-bold mb-0">{{ \App\Models\Review::where('rating', 5)->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-info text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">4 Star Reviews</h6>
                    <h2 class="fw-bold mb-0">{{ \App\Models\Review::where('rating', 4)->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-secondary text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Average Rating</h6>
                    <h2 class="fw-bold mb-0">{{ number_format(\App\Models\Review::avg('rating'), 1) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews List -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            @forelse($reviews as $review)
            <div class="review-item p-4 border-bottom">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar-circle bg-info text-white me-2">
                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">{{ $review->user->name }}</h6>
                                <small class="text-muted">{{ $review->user->email }}</small>
                            </div>
                        </div>
                        
                        <h5 class="fw-bold mb-2">{{ $review->title }}</h5>
                        @if($review->service)
                            <div class="mb-2"><small class="text-muted">Service: <a href="{{ route('services.show', $review->service->id) }}">{{ $review->service->name }}</a></small></div>
                        @endif
                        
                        <div class="mb-2">
                            <span class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </span>
                            <span class="text-muted ms-2">({{ $review->rating }}/5)</span>
                        </div>
                        
                        <p class="mb-2 text-dark">{{ $review->comment }}</p>
                        
                        <div class="d-flex gap-3 text-muted small">
                            <span><i class="bi bi-calendar3 me-1"></i>{{ $review->created_at->format('M d, Y') }}</span>
                            <span><i class="bi bi-clock me-1"></i>{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    
                    <div class="ms-3">
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this review?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-5 text-muted">
                <i class="bi bi-chat-left-text fs-1 d-block mb-3"></i>
                <p class="mb-0">No reviews found.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Pagination -->
    @if($reviews->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $reviews->links() }}
    </div>
    @endif
</div>

<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.1rem;
}

.review-item {
    transition: background-color 0.2s ease;
}

.review-item:hover {
    background-color: #f8f9fa;
}

.review-item:last-child {
    border-bottom: none !important;
}
</style>
@endsection
