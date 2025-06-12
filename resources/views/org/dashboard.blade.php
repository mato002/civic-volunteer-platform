@extends('layouts.organization')

@section('title', 'Organization Dashboard')

@section('content')
<div class="content-area">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="text-3xl font-bold text-dark-color">Welcome, {{ Auth::guard('organization')->user()->name }}!</h1>
            <p class="text-muted mt-2">Manage your volunteering opportunities and track engagement from here.</p>
        </div>
        <a href="{{ route('org.opportunities.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Post New Opportunity
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

    <!-- Stats Section -->
    <div class="row g-4 mb-5">
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary-color text-white rounded-circle p-3 me-3">
                        <i class="fas fa-hands-helping fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold mb-1">Total Opportunities</h2>
                        <p class="text-3xl font-bold text-dark-color">{{ $totalOpportunities }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success-color text-white rounded-circle p-3 me-3">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold mb-1">Volunteers Registered</h2>
                        <p class="text-3xl font-bold text-dark-color">{{ $totalRegistrations }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-warning-color text-white rounded-circle p-3 me-3">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold mb-1">Upcoming Events</h2>
                        <p class="text-3xl font-bold text-dark-color">{{ $upcomingEvents }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity and Engagement -->
    <div class="row g-4">
        <!-- Recent Opportunities -->
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="text-xl font-semibold">Recent Opportunities</h2>
                        <a href="{{ route('org.opportunities.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye me-2"></i> View All
                        </a>
                    </div>
                    @if ($recentOpportunities->isEmpty())
                        <div class="text-center py-4">
                            <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No opportunities posted yet.</p>
                            <a href="{{ route('org.opportunities.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus-circle me-2"></i> Create Opportunity
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>Registrations</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentOpportunities as $opportunity)
                                        <tr>
                                            <td>{{ $opportunity->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($opportunity->start_date)->format('M d, Y') }}</td>
                                            <td>{{ $opportunity->registrations_count }}</td>
                                            <td>
                                                <span class="badge bg-{{ now()->lt($opportunity->start_date) ? 'success' : 'secondary' }}">
                                                    {{ now()->lt($opportunity->start_date) ? 'Upcoming' : 'Past' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('org.opportunities.edit', $opportunity->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Volunteer Engagement -->
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="text-xl font-semibold mb-4">Volunteer Engagement</h2>
                    <div class="mb-4">
                        <p><strong>Recent Volunteers (Last 30 Days):</strong> {{ $recentVolunteers }}</p>
                        <p><strong>Total Registrations:</strong> {{ $totalRegistrations }}</p>
                    </div>
                    <hr>
                    <h3 class="text-lg font-semibold mb-3">Quick Actions</h3>
                    <div class="d-grid gap-2">
                        <a href="{{ route('org.registrations.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-users me-2"></i> View Registrations
                        </a>
                        <a href="{{ route('org.profile.edit') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-cog me-2"></i> Update Profile
                        </a>
                    </div>
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