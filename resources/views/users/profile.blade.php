@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Profile Information Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                    <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Profile Information</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Profile Photo Section -->
                        <div class="text-center mb-4">
                            <label class="form-label fw-bold mb-3 d-block fs-5">Profile Photo</label>
                            <div class="d-flex flex-column align-items-center">
                                <div class="position-relative mb-3">
                                    <img id="photo-preview" 
                                         src="{{ Auth::user()->photo_url }}" 
                                         alt="Profile Photo" 
                                         class="rounded-circle shadow-lg"
                                         style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #8B5A2B;">
                                    <label for="photo" 
                                           class="position-absolute bottom-0 end-0 rounded-circle shadow d-flex align-items-center justify-content-center camera-btn" 
                                           style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: 3px solid white; width: 45px; height: 45px; cursor: pointer;"
                                           title="Click to change photo">
                                        <i class="bi bi-camera-fill text-white fs-5"></i>
                                    </label>
                                </div>
                                <input type="file" id="photo" name="photo" accept="image/*" class="d-none" onchange="previewPhoto(event)">
                                
                                <div class="d-flex flex-column gap-2 mb-2">
                                    <label for="photo" class="btn btn-sm text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: none;">
                                        <i class="bi bi-upload me-1"></i> Change Photo
                                    </label>

                                    <button id="delete-photo-btn" type="button" class="btn btn-sm btn-danger" data-has-photo="{{ Auth::user()->photo ? '1' : '0' }}" onclick="confirmDeletePhoto()">
                                        <i class="bi bi-trash me-1"></i> Delete Photo
                                    </button>
                                </div>
                            </div>
                            @error('photo')
                                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4 border-2">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Account Role</label>
                                <input type="text" class="form-control bg-light" 
                                       value="{{ ucfirst($user->role) }}" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Member Since</label>
                                <input type="text" class="form-control bg-light" 
                                       value="{{ $user->created_at->format('F d, Y') }}" readonly>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: none;">
                                <i class="bi bi-save me-2"></i>Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Hidden form for deleting photo (outside main form) -->
            <form id="delete-photo-form" action="{{ route('profile.photo.delete') }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')
            </form>

            <!-- Change Password Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header text-white py-3" style="background: #4A6B3C;">
                    <h4 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Change Password</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-semibold">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" name="current_password" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label fw-semibold">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background: #4A6B3C; border: none;">
                                <i class="bi bi-key me-2"></i>Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="card shadow-sm border-0 border-danger mt-4">
                <div class="card-header bg-danger text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-exclamation-triangle me-2"></i>Delete My Account</h4>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-warning mb-4">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>Warning:</strong> Once you delete your account, there is no going back. This action will permanently delete:
                        <ul class="mb-0 mt-2">
                            <li>Your profile information</li>
                            <li>All your reviews and ratings</li>
                            <li>Your profile photo</li>
                        </ul>
                    </div>

                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        <i class="bi bi-trash me-2"></i>Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Confirmation Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteAccountModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>Confirm Account Deletion
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.account.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    <p class="fw-bold text-danger">This action cannot be undone!</p>
                    <p>Please enter your password to confirm account deletion:</p>
                    
                    <div class="mb-3">
                        <label for="delete_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="delete_password" name="password" required>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>Yes, Delete My Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hidden form for deleting photo (outside main form) -->
<form id="delete-photo-form" action="{{ route('profile.photo.delete') }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<style>
.camera-btn {
    transition: all 0.3s ease;
}

.camera-btn:hover {
    transform: scale(1.15);
    box-shadow: 0 6px 20px rgba(92, 64, 51, 0.6) !important;
}

.camera-btn:active {
    transform: scale(0.95);
}

/* Pulse animation */
@keyframes pulse-camera {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    50% {
        transform: scale(1.08);
        box-shadow: 0 4px 15px rgba(92, 64, 51, 0.5);
    }
}

.camera-btn {
    animation: pulse-camera 2s ease-in-out 3;
}
</style>

<script>
function previewPhoto(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photo-preview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

function confirmDeletePhoto() {
    const btn = document.getElementById('delete-photo-btn');
    const hasPhoto = btn ? btn.dataset.hasPhoto === '1' : false;

    if (!hasPhoto) {
        alert('You do not have a custom profile photo to delete.');
        return;
    }

    if (confirm('Are you sure you want to delete your profile photo? This action cannot be undone.')) {
        document.getElementById('delete-photo-form').submit();
    }
}
</script>
@endsection
