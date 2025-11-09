@extends('layout.mainlayout')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0 card-rounded-20">
                <div class="card-header text-white py-4 card-header-gradient-alert">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0 fw-bold"><i class="fas fa-users-cog me-2"></i>User Management</h3>
                            <small>Manage all registered users</small>
                        </div>
                        <div>
                            <span class="badge bg-light text-dark fs-6">{{ $users->total() }} Total Users</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-bold">#</th>
                                    <th class="fw-bold"><i class="fas fa-user me-2"></i>Name</th>
                                    <th class="fw-bold"><i class="fas fa-envelope me-2"></i>Email</th>
                                    <th class="fw-bold"><i class="fas fa-shield-alt me-2"></i>Role</th>
                                    <th class="fw-bold"><i class="fas fa-star me-2"></i>Reviews</th>
                                    <th class="fw-bold"><i class="fas fa-calendar me-2"></i>Joined</th>
                                    <th class="fw-bold text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr class="user-row">
                                        <td class="align-middle">{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-2">
                                                    <i class="fas fa-user-circle fa-2x text-primary"></i>
                                                </div>
                                                <span class="fw-semibold">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        <td class="align-middle">
                                            @if($user->isAdmin())
                                                <span class="badge bg-warning px-3 py-2">
                                                    <i class="fas fa-crown me-1"></i>Admin
                                                </span>
                                            @else
                                                <span class="badge bg-primary px-3 py-2">
                                                    <i class="fas fa-user me-1"></i>User
                                                </span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge bg-success">{{ $user->reviews->count() }} Reviews</span>
                                        </td>
                                        <td class="align-middle">{{ $user->created_at->format('M d, Y') }}</td>
                                        <td class="align-middle text-center">
                                            @if($user->id !== Auth::id())
                        <button type="button" class="btn btn-danger btn-sm rounded-8" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal{{ $user->id }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>

                                                <!-- Delete Modal -->
                                                <div class="modal fade modal-rounded-15" id="deleteModal{{ $user->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete</h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete user <strong>{{ $user->name }}</strong>?</p>
                                                                <p class="text-danger mb-0"><i class="fas fa-info-circle me-1"></i>This action cannot be undone!</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fas fa-trash me-1"></i>Delete User
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="badge bg-secondary">Current User</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No users found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- view-level styles moved to public/style/styles.css -->
@endsection
