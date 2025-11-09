@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"><i class="bi bi-person-badge text-info me-2"></i>User Details</h2>
            <p class="text-muted mb-0">Viewing information for: <strong>{{ $user->name }}</strong></p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Users
        </a>
    </div>

    <div class="row g-4">
        <!-- User Information Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="avatar-circle-large bg-info text-white mx-auto mb-3">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <h4 class="fw-bold mb-2">{{ $user->name }}</h4>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    
                    @if($user->role === 'admin')
                        <span class="badge bg-warning text-dark fs-6">
                            <i class="bi bi-shield-fill-check me-1"></i>Administrator
                        </span>
                    @else
                        <span class="badge bg-info fs-6">
                            <i class="bi bi-person-fill me-1"></i>Regular User
                        </span>
                    @endif
                    
                    <hr class="my-4">
                    
                    <div class="text-start">
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">User ID</small>
                            <strong>#{{ $user->id }}</strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Member Since</small>
                            <strong>{{ $user->created_at->format('F d, Y') }}</strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Last Updated</small>
                            <strong>{{ $user->updated_at->format('F d, Y') }}</strong>
                        </div>
                        <div>
                            <small class="text-muted d-block mb-1">Total Reviews</small>
                            <strong>{{ $user->reviews->count() }} reviews</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Reviews -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light py-3">
                    <h5 class="mb-0"><i class="bi bi-chat-left-text me-2"></i>User Reviews ({{ $user->reviews->count() }})</h5>
                </div>
                <div class="card-body p-0">
                    @forelse($user->reviews as $review)
                    <div class="p-4 border-bottom">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-2">{{ $review->title }}</h6>
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
                    </div>
                    @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-chat-left-text fs-1 d-block mb-2"></i>
                        <p class="mb-0">This user hasn't created any reviews yet.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle-large {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 2.5rem;
}
</style>
@endsection
