@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Create New Review</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Review Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" 
                                   placeholder="Enter review title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label fw-semibold">Rating</label>
                            <select class="form-select @error('rating') is-invalid @enderror" 
                                    id="rating" name="rating" required>
                                <option value="">Select rating...</option>
                                <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Excellent</option>
                                <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ Very Good</option>
                                <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ Good</option>
                                <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐ Fair</option>
                                <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐ Poor</option>
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label fw-semibold">Comment</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" 
                                      id="comment" name="comment" rows="5" 
                                      placeholder="Write your review here... (minimum 10 characters)" 
                                      required>{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success flex-grow-1">
                                <i class="bi bi-save me-2"></i>Submit Review
                            </button>
                            <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
