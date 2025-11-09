@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <img src="{{ Auth::user()->photo_url }}" 
                         alt="{{ Auth::user()->name }}" 
                         class="rounded-circle me-3"
                         style="width: 60px; height: 60px; object-fit: cover; border: 3px solid #4A6B3C;">
                    <div>
                        <h2 class="fw-bold mb-0"><i class="bi bi-chat-left-text me-2"></i>My Reviews</h2>
                        <p class="text-muted mb-0 small">{{ Auth::user()->name }}</p>
                    </div>
                </div>
                {{-- Removed "Add New Review" button - reviews can only be created from service pages --}}
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @forelse($reviews as $index => $review)
            <div class="card mb-3 shadow-sm border-0">
                @if($loop->iteration % 2 == 1)
                <div class="card-header text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                    <h6 class="mb-0 fw-bold">{{ $review->title }}</h6>
                </div>
                @else
                <div class="card-header text-white" style="background: #4A6B3C;">
                    <h6 class="mb-0 fw-bold">{{ $review->title }}</h6>
                </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-start flex-grow-1">
                            <img src="{{ Auth::user()->photo_url }}" 
                                 alt="{{ Auth::user()->name }}" 
                                 class="rounded-circle me-3"
                                 style="width: 45px; height: 45px; object-fit: cover; border: 2px solid {{ $loop->iteration % 2 == 1 ? '#8B5A2B' : '#4A6B3C' }};">
                            <div class="flex-grow-1">
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
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm text-white" style="background: {{ $loop->iteration % 2 == 1 ? 'linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%)' : '#4A6B3C' }}; border: none;">
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
                <p class="text-muted">Visit a <a href="{{ route('services.index') }}">service page</a> to leave a review.</p>
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
