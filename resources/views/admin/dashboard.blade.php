@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">
        <i class="bi bi-shield-fill-check text-success"></i> Admin Dashboard
    </h2>

    <div class="row g-4">
        <!-- Statistics Cards -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Total Users</h6>
                    <h2 class="fw-bold mb-0">{{ \App\Models\User::count() }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Total Woods</h6>
                    <h2 class="fw-bold mb-0">{{ \App\Models\Wood::count() }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-info text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Total Services</h6>
                    <h2 class="fw-bold mb-0">{{ \App\Models\Service::count() }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-warning text-white">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Total Reviews</h6>
                    <h2 class="fw-bold mb-0">{{ \App\Models\Review::count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Sections -->
    <div class="row mt-5 g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                    <h5 class="mb-0"><i class="bi bi-tree"></i> Woods Management</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Manage wood products, add new woods, edit or delete existing ones.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.woods.index') }}" class="btn btn-outline-secondary">View All</a>
                        <a href="{{ route('admin.woods.create') }}" class="btn text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: none;">Add New Wood</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background: #4A6B3C;">
                    <h5 class="mb-0"><i class="bi bi-tools"></i> Services Management</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Manage services offered, add new services, edit or delete existing ones.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">View All</a>
                        <a href="{{ route('admin.services.create') }}" class="btn text-white" style="background: #4A6B3C; border: none;">Add New Service</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%);">
                    <h5 class="mb-0"><i class="bi bi-people"></i> Users Management</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Manage users, view user list, and manage user roles.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.users.index') }}" class="btn text-white" style="background: linear-gradient(135deg, #5C4033 0%, #8B5A2B 100%); border: none;">View All Users</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background: #4A6B3C;">
                    <h5 class="mb-0"><i class="bi bi-chat-left-text"></i> Reviews Management</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">View all reviews, moderate comments, and manage user feedback.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.reviews.index') }}" class="btn text-white" style="background: #4A6B3C; border: none;">View All Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="mt-5">
        <h4 class="fw-bold mb-3">Recent Reviews</h4>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Title</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Review::with('user')->latest()->take(5)->get() as $review)
                            <tr>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->title }}</td>
                                <td>
                                    <span class="text-warning">
                                       @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                                    </span>
                                </td>
                                <td>{{ Str::limit($review->comment, 50) }}</td>
                                <td>{{ $review->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
