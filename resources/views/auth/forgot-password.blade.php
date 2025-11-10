@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h2 class="fw-bold text-center mb-4 text-success">Forgot Your Password?</h2>
                    <p class="text-center text-muted mb-4">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100 mb-3">
                            Send Password Reset Link
                        </button>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-success text-decoration-none fw-bold">
                                Back to Sign In
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection