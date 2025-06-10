@extends('layouts.volunteer')

@section('title', $opportunity->title)

@section('content')
<div class="content-area">
    <h2 class="mb-4">{{ $opportunity->title }}</h2>
    <p class="text-muted mb-5">Explore the details of this volunteering opportunity and apply to make a difference!</p>

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

    <div class="row g-4">
        <div class="col-lg-8 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4"><i class="fas fa-hands-helping me-2"></i> Opportunity Details</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-building me-2"></i> Organization:</strong> {{ $opportunity->organization->name ?? 'No Organization' }}</p>
                            <p><strong><i class="fas fa-map-marker-alt me-2"></i> Location:</strong> {{ $opportunity->location ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-calendar-alt me-2"></i> Start Date:</strong> {{ \Carbon\Carbon::parse($opportunity->start_date)->format('M d, Y') }}</p>
                            <p><strong><i class="fas fa-calendar-check me-2"></i> End Date:</strong> {{ \Carbon\Carbon::parse($opportunity->end_date)->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-3">Description</h5>
                    <p class="text-justify">{{ $opportunity->description }}</p>
                </div>
                <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                    <a href="{{ route('volunteer.opportunities.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Back to Opportunities
                    </a>
                    <form action="{{ route('volunteer.opportunities.apply', $opportunity->id) }}" method="POST">
                        @csrf
                        @if (Auth::guard('volunteer')->user()->registrations()->where('opportunity_id', $opportunity->id)->exists())
                            <button type="submit" class="btn btn-success" disabled>
                                <i class="fas fa-check me-2"></i> Already Applied
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-hand-helping me-2"></i> Apply Now
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4"><i class="fas fa-info-circle me-2"></i> Additional Information</h5>
                    <p><strong><i class="fas fa-users me-2"></i> Category:</strong> {{ $opportunity->category ?? 'General Volunteering' }}</p>
                    <p><strong><i class="fas fa-clock me-2"></i> Duration:</strong> {{ \Carbon\Carbon::parse($opportunity->start_date)->diffInDays($opportunity->end_date) + 1 }} days</p>
                    <p><strong><i class="fas fa-tools me-2"></i> Skills Required:</strong> {{ $opportunity->skills ? implode(', ', $opportunity->skills) : 'None specified' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
        });
    });
</script>
@endpush