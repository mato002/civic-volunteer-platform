@extends('layouts.volunteer')

@section('title', 'Registration Details')

@section('content')
<div class="content-area">
    <h2 class="mb-4">Registration Details</h2>
    <p class="text-muted mb-5">View the details of your registration and manage your participation.</p>

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
                    <h5 class="card-title mb-4"><i class="fas fa-calendar-check me-2"></i> Registration Information</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p>
                                <strong><i class="fas fa-hands-helping me-2"></i> Opportunity:</strong>
                                {{ $registration->opportunity->title ?? 'N/A' }}
                                @if (!$registration->opportunity)
                                    <span class="badge bg-warning text-dark ms-2">Opportunity Deleted</span>
                                @endif
                            </p>
                            <p><strong><i class="fas fa-building me-2"></i> Organization:</strong> {{ $registration->opportunity->organization->name ?? 'No Organization' }}</p>
                            <p><strong><i class="fas fa-map-marker-alt me-2"></i> Location:</strong> {{ $registration->opportunity->location ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-calendar-alt me-2"></i> Start Date:</strong> {{ $registration->opportunity ? \Carbon\Carbon::parse($registration->opportunity->start_date)->format('M d, Y') : 'N/A' }}</p>
                            <p><strong><i class="fas fa-calendar-check me-2"></i> End Date:</strong> {{ $registration->opportunity ? \Carbon\Carbon::parse($registration->opportunity->end_date)->format('M d, Y') : 'N/A' }}</p>
                            <p>
                                <strong><i class="fas fa-info-circle me-2"></i> Status:</strong>
                                <span class="badge bg-{{ $registration->status == 'confirmed' ? 'success' : ($registration->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <p><strong><i class="fas fa-clock me-2"></i> Registered On:</strong> {{ $registration->created_at->format('M d, Y H:i') }}</p>
                    @if ($registration->opportunity && $registration->opportunity->description)
                        <hr>
                        <h5 class="mb-3">Opportunity Description</h5>
                        <p class="text-justify">{{ $registration->opportunity->description }}</p>
                    @endif
                </div>
                <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                    <a href="{{ route('volunteer.registrations.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Back to My Registrations
                    </a>
                    @if ($registration->status == 'pending' && $registration->opportunity)
                        <form action="{{ route('volunteer.registrations.cancel', $registration->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this registration?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-times me-2"></i> Cancel Registration
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4"><i class="fas fa-info-circle me-2"></i> Additional Details</h5>
                    <p><strong><i class="fas fa-users me-2"></i> Category:</strong> {{ $registration->opportunity->category ?? 'General Volunteering' }}</p>
                    <p><strong><i class="fas fa-clock me-2"></i> Duration:</strong> 
                        {{ $registration->opportunity ? (\Carbon\Carbon::parse($registration->opportunity->start_date)->diffInDays($registration->opportunity->end_date) + 1) . ' days' : 'N/A' }}
                    </p>
                    <p><strong><i class="fas fa-tools me-2"></i> Skills Required:</strong> 
                        {{ $registration->opportunity && $registration->opportunity->skills ? implode(', ', $registration->opportunity->skills) : 'None specified' }}
                    </p>
                    @if ($registration->opportunity)
                        <a href="{{ route('volunteer.opportunities.show', $registration->opportunity->id) }}" class="btn btn-sm btn-primary mt-3">
                            <i class="fas fa-eye me-2"></i> View Opportunity
                        </a>
                    @endif
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