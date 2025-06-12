@extends('layouts.organization')

@section('title', 'Post New Opportunity')

@section('content')
<div class="content-area">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-3xl font-bold text-dark-color">
                    <i class="fas fa-plus-circle me-2"></i> Post New Opportunity
                </h1>
                <a href="{{ route('org.opportunities.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Back to Opportunities
                </a>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('org.opportunities.store') }}" method="POST" class="max-w-lg">
                @csrf

                <div class="mb-4">
                    <label for="title" class="form-label text-dark-color fw-semibold">
                        <i class="fas fa-heading me-2"></i> Title
                    </label>
                    <input type="text" name="title" id="title" class="form-control rounded" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @error
                </div>

                <div class="mb-4">
                    <label for="location" class="form-label text-dark-color fw-semibold">
                        <i class="fas fa-map-marker-alt me-2"></i> Location
                    </label>
                    <input type="text" name="location" id="location" class="form-control rounded" value="{{ old('location') }}" required>
                    @error('location')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @error
                </div>

                <div class="mb-4">
                    <label for="date" class="form-label text-dark-color fw-semibold">
                        <i class="fas fa-calendar-alt me-2"></i> Date
                    </label>
                    <input type="date" name="date" id="date" class="form-control rounded" value="{{ old('date') }}" required>
                    @error('date')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @error
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label text-dark-color fw-semibold">
                        <i class="fas fa-align-left me-2"></i> Description
                    </label>
                    <textarea name="description" id="description" rows="5" class="form-control rounded" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @error
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i> Post Opportunity
                    </button>
                    <a href="{{ route('org.opportunities.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        form.style.animation = `fadeIn 0.5s ease forwards`;
    });
</script>
@endpush

@endsection

