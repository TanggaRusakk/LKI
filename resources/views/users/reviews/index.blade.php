@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0"><i class="bi bi-chat-left-text me-2"></i>My Reviews</h2>
                <a href="{{ route('reviews.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-2"></i>Add New Review
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @forelse($reviews as $review)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-2">{{ $review->title }}</h5>
                            <div class="text-warning mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                                <span class="text-muted ms-2">({{ $review->rating }}/5)</span>
                            </div>
                            <p class="mb-2">{{ $review->comment }}</p>
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i>{{ $review->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this review?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <i class="bi bi-chat-left-text fs-1 text-muted mb-3 d-block"></i>
                <p class="text-muted mb-3">You haven't created any reviews yet.</p>
                <a href="{{ route('reviews.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-2"></i>Create Your First Review
                </a>
            </div>
            @endforelse

            @if($reviews->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $reviews->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
