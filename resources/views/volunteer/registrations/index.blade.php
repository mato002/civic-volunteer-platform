@extends('layouts.volunteer')

@section('title', 'My Registrations')

@section('content')
<div class="content-area">
    <h2 class="mb-4">My Registrations</h2>
    <p class="text-muted mb-5">View and manage your registered volunteering opportunities.</p>

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

    @if($registrations->isEmpty())
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                <p class="text-muted">You have not registered for any events yet.</p>
                <a href="{{ route('volunteer.opportunities.index') }}" class="btn btn-primary">
                    <i class="fas fa-search me-2"></i> Browse Opportunities
                </a>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Opportunity</th>
                                <th>Organization</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Registered On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td>
                                        <a href="{{ route('volunteer.registrations.show', $registration->id) }}">
                                            {{ $registration->opportunity->title ?? 'Event #' . $registration->id }}
                                        </a>
                                    </td>
                                    <td>{{ $registration->opportunity->organization->name ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($registration->opportunity->start_date)->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $registration->status == 'confirmed' ? 'success' : 'warning' }}">
                                            {{ ucfirst($registration->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $registration->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('volunteer.registrations.show', $registration->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
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