@extends('layouts.volunteer')

@section('title', 'Volunteer Dashboard')

@section('content')
<div class="content-area">
    <h2 class="mb-4">Welcome to Your Volunteer Dashboard, {{ Auth::guard('volunteer')->user()->name }}!</h2>
    <p class="text-muted mb-5">Manage your volunteering activities, track your impact, and discover new opportunities.</p>

    <!-- Dashboard Widgets -->
    <div class="row g-4">
        <!-- Active Signups Widget -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-calendar-check fa-2x text-primary me-3"></i>
                        <h5 class="card-title mb-0">Active Signups</h5>
                    </div>
                    <p class="card-text text-muted">You are currently signed up for <strong>{{ $activeSignups ?? 0 }}</strong> volunteering opportunities.</p>
                    <a href="{{ route('volunteer.registrations.index') }}" class="btn btn-sm btn-primary mt-3">View Signups</a>
                </div>
            </div>
        </div>

        <!-- Hours Contributed Widget -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock fa-2x text-success me-3"></i>
                        <h5 class="card-title mb-0">Hours Contributed</h5>
                    </div>
                    <p class="card-text text-muted">You've contributed <strong>{{ $totalHours ?? 0 }}</strong> hours to community projects.</p>
                    <a href="{{ route('volunteer.feedback.index') }}" class="btn btn-sm btn-success mt-3">View Activity Log</a>
                </div>
            </div>
        </div>

        <!-- Impact Summary Widget -->
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-heart fa-2x text-danger me-3"></i>
                        <h5 class="card-title mb-0">Your Impact</h5>
                    </div>
                    <p class="card-text text-muted">You've made a difference in <strong>{{ $projectsSupported ?? 0 }}</strong> community projects.</p>
                    <a href="{{ route('volunteer.feedback.index') }}" class="btn btn-sm btn-danger mt-3">See Impact Details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Upcoming Volunteering Events</h5>
                    @if (isset($upcomingEvents) && count($upcomingEvents) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upcomingEvents as $event)
                                        <tr>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->date->format('M d, Y') }}</td>
                                            <td>{{ $event->location }}</td>
                                            <td>
                                                <span class="badge bg-{{ $event->status == 'confirmed' ? 'success' : 'warning' }}">
                                                    {{ ucfirst($event->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('volunteer.opportunities.show', $event->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No upcoming events. <a href="{{ route('volunteer.opportunities.index') }}">Browse opportunities</a> to find your next volunteering experience!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Recent Activity</h5>
                    @if (isset($recentActivities) && count($recentActivities) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($recentActivities as $activity)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-{{ $activity->type == 'signup' ? 'calendar-plus' : 'comment-alt' }} me-2 text-primary"></i>
                                        {{ $activity->description }}
                                    </div>
                                    <span class="text-muted small">{{ $activity->created_at->diffForHumans() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No recent activity. Start volunteering to see your actions here!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Quick Actions</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('volunteer.opportunities.index') }}" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i> Find Opportunities
                        </a>
                        <a href="{{ route('volunteer.profile') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-user me-2"></i> Update Profile
                        </a>
                        <a href="{{ route('volunteer.feedback.index') }}" class="btn btn-outline-success">
                            <i class="fas fa-comment-alt me-2"></i> Submit Feedback
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
    // Optional: Add any client-side interactivity specific to the dashboard
    document.addEventListener('DOMContentLoaded', function() {
        // Example: Add animation to cards on load
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
        });
    });
</script>
@endpush