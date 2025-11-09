@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"><i class="bi bi-tree-fill text-success me-2"></i>Woods Management</h2>
            <p class="text-muted mb-0">Manage all wood types</p>
        </div>
        <a href="{{ route('admin.woods.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-2"></i>Add New Wood
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="80">Image</th>
                            <th>Name</th>
                            <th>Origin</th>
                            <th>Description</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($woods as $wood)
                        <tr>
                            <td>
                                <img src="{{ asset($wood->image) }}" alt="{{ $wood->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td class="fw-semibold">{{ $wood->name }}</td>
                            <td>
                                <span class="badge {{ $wood->origin == 'local' ? 'bg-success' : 'bg-info' }}">
                                    {{ ucfirst($wood->origin) }}
                                </span>
                            </td>
                            <td>{{ Str::limit($wood->description, 100) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.woods.edit', $wood) }}" class="btn btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.woods.destroy', $wood) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this wood?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-tree fs-1 d-block mb-3"></i>
                                <p class="mb-0">No woods found. <a href="{{ route('admin.woods.create') }}">Add your first wood</a></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($woods->hasPages())
    <div class="mt-4 d-flex flex-column align-items-center">
        <div class="d-flex justify-content-center w-100 no-pagination-summary">
            {{ $woods->links() }}
        </div>
        <div class="text-muted small mt-2">
            @if($woods->total() > 0)
                Showing {{ $woods->firstItem() }} to {{ $woods->lastItem() }} of {{ $woods->total() }} results
            @else
                Showing 0 results
            @endif
        </div>
    </div>
    @endif
</div>
@endsection
