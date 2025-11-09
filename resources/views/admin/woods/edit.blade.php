@extends('layout.mainlayout')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 card-rounded-20">
                <div class="card-header text-white py-4 navbar-custom">
                    <h3 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i>Edit Wood</h3>
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

                    <form method="POST" action="{{ route('admin.woods.update', $wood) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Wood Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $wood->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="origin" class="form-label fw-semibold">Origin <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg @error('origin') is-invalid @enderror" 
                                    id="origin" name="origin" required>
                                <option value="">Select origin</option>
                                <option value="local" {{ old('origin', $wood->origin) == 'local' ? 'selected' : '' }}>Local</option>
                                <option value="imported" {{ old('origin', $wood->origin) == 'imported' ? 'selected' : '' }}>Imported</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $wood->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="characteristics" class="form-label fw-semibold">Characteristics</label>
                            <textarea class="form-control @error('characteristics') is-invalid @enderror" 
                                      id="characteristics" name="characteristics" rows="4" required>{{ old('characteristics', $wood->characteristics) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="uses" class="form-label fw-semibold">Uses</label>
                            <textarea class="form-control @error('uses') is-invalid @enderror" 
                                      id="uses" name="uses" rows="4" required>{{ old('uses', $wood->uses) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">Wood Image</label>
                            
                            @if($wood->image)
                                <div class="mb-3">
                                    <p class="text-muted mb-2">Current Image:</p>
                                    <img src="{{ asset($wood->image) }}" alt="{{ $wood->name }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                            
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Leave empty to keep current image. Accepted: JPG, PNG, GIF (Max: 2MB)</small>
                            
                            <div class="mt-3" id="imagePreview" style="display: none;">
                                <p class="text-muted mb-2">New Image Preview:</p>
                                <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-lg flex-grow-1 py-3 fw-bold btn-radius-12 text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                                <i class="fas fa-save me-2"></i>Update Wood
                            </button>
                            <a href="{{ route('admin.woods.index') }}" class="btn btn-secondary btn-lg py-3 btn-radius-12">
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
