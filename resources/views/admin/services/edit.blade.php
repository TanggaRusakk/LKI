@extends('layout.mainlayout')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 card-rounded-20">
                <div class="card-header text-white py-4 card-header-gradient-warning">
                    <h3 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i>Edit Service</h3>
                </div>
                <div class="card-body p-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Service Name</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $service->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="5" required>{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold">Price (IDR)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control form-control-lg @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $service->price) }}" 
                                       min="0" step="1000" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">Service Image</label>
                            
                            @if($service->image)
                                <div class="mb-3">
                                    <p class="text-muted mb-2">Current Image:</p>
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="img-thumbnail img-thumbnail-max200">
                                </div>
                            @endif
                            
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Leave empty to keep current image. Accepted: JPG, PNG, GIF (Max: 2MB)</small>
                            
                            <div class="mt-3 image-preview-hidden" id="imagePreview">
                                <p class="text-muted mb-2">New Image Preview:</p>
                                <img id="preview" src="" alt="Preview" class="img-thumbnail img-thumbnail-max200">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning btn-lg flex-grow-1 py-3 fw-bold btn-radius-12">
                                <i class="fas fa-save me-2"></i>Update Service
                            </button>
                            <a href="{{ route('services.index') }}" class="btn btn-secondary btn-lg py-3 btn-radius-12">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>

<!-- view-level styles moved to public/style/styles.css -->
@endsection
