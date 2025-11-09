@extends('layout.mainlayout')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 card-rounded-20">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="register-icon mb-3">
                            <i class="fas fa-user-plus fa-4x text-primary"></i>
                        </div>
                        <h2 class="fw-bold gradient-text-blue">Create Account</h2>
                        <p class="text-muted">Join us today!</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
                                       placeholder="Enter your full name" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                       id="password" name="password" 
                                       placeholder="Minimum 8 characters" required>
                            </div>
                            <small class="text-muted">Must be at least 8 characters</small>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" 
                                       id="password_confirmation" name="password_confirmation" 
                                       placeholder="Re-enter your password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold btn-radius-12 btn-gradient-primary borderless">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted">Already have an account? 
                            <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register view uses centralized styles in public/style/styles.css -->
@endsection
