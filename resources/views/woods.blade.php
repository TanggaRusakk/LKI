@extends('layout.mainlayout')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5 fade-in">Wood Types That We Usually Handle</h2>

    {{-- Kayu Lokal Section --}}
    <section class="mb-5 fade-up">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="fw-bold text-success mb-0">Local Woods</h3>
            <hr class="flex-grow-1 ms-3 border-2 border-success opacity-50">
        </div>
        
        {{-- Search Bar untuk Lokal --}}
        <div class="mb-4">
            <form action="{{ route('woods') }}" method="GET">
                <input type="hidden" name="section" value="local">
                <div class="input-group">
                    <input type="text" name="search_local" class="form-control" 
                           placeholder="Search local woods..." 
                           value="{{ request('search_local') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                    @if(request('search_local'))
                        <a href="{{ route('woods') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="row gy-4">
            @forelse($localWoods as $wood)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 wood-card">
                    <img src="{{ asset($wood->image) }}" class="card-img-top rounded-top" alt="{{ $wood->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold text-success">{{ $wood->name }}</h5>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt-fill"></i> {{ $wood->origin }}</p>
                        <p class="text-muted small flex-grow-1">{{ Str::limit($wood->description, 120) }}</p>
                        <a href="{{ route('woods.show', $wood->id) }}" 
                            class="btn btn-outline-success rounded-pill mt-3">View More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">No local woods found.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination untuk Local Woods --}}
        @if($localWoods->hasPages())
        <div class="mt-4 d-flex flex-column align-items-center">
            <div class="d-flex justify-content-center w-100 no-pagination-summary">
                {{ $localWoods->appends(['search_local' => request('search_local')])->links() }}
            </div>
            <div class="text-muted small mt-2">
                @if($localWoods->total() > 0)
                    Showing {{ $localWoods->firstItem() }} to {{ $localWoods->lastItem() }} of {{ $localWoods->total() }} results
                @else
                    Showing 0 results
                @endif
            </div>
        </div>
        @endif
    </section>

    {{-- Kayu Impor Section --}}
    <section class="fade-up">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="fw-bold text-success mb-0">Imported Woods</h3>
            <hr class="flex-grow-1 ms-3 border-2 border-success opacity-50">
        </div>
        
        {{-- Search Bar untuk Impor --}}
        <div class="mb-4">
            <form action="{{ route('woods') }}" method="GET">
                <input type="hidden" name="section" value="import">
                <div class="input-group">
                    <input type="text" name="search_import" class="form-control" 
                           placeholder="Search imported woods..." 
                           value="{{ request('search_import') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                    @if(request('search_import'))
                        <a href="{{ route('woods') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="row gy-4">
            @forelse($importWoods as $wood)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 wood-card">
                    <img src="{{ asset($wood->image) }}" class="card-img-top rounded-top" alt="{{ $wood->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold text-success">{{ $wood->name }}</h5>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt-fill"></i> {{ $wood->origin }}</p>
                        <p class="text-muted small flex-grow-1">{{ Str::limit($wood->description, 120) }}</p>
                        <a href="{{ route('woods.show', $wood->id) }}" 
                            class="btn btn-outline-success rounded-pill mt-3">View More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">No imported woods found.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination untuk Import Woods --}}
        @if($importWoods->hasPages())
        <div class="mt-4 d-flex flex-column align-items-center">
            <div class="d-flex justify-content-center w-100 no-pagination-summary">
                {{ $importWoods->appends(['search_import' => request('search_import')])->links() }}
            </div>
            <div class="text-muted small mt-2">
                @if($importWoods->total() > 0)
                    Showing {{ $importWoods->firstItem() }} to {{ $importWoods->lastItem() }} of {{ $importWoods->total() }} results
                @else
                    Showing 0 results
                @endif
            </div>
        </div>
        @endif
    </section>
</div>
@endsection
