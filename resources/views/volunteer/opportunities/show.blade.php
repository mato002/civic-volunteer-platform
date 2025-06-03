@extends('layouts.volunteer')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $opportunity->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Organization:</strong> 
                {{ $opportunity->organization->name ?? 'No Organization' }}
            </p>
            <p><strong>Location:</strong> {{ $opportunity->location ?? 'N/A' }}</p>
            <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($opportunity->start_date)->format('M d, Y') }}</p>
            <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($opportunity->end_date)->format('M d, Y') }}</p>
            <hr>
            <h5>Description:</h5>
            <p class="text-justify">{{ $opportunity->description }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('volunteer.opportunities.index') }}" class="btn btn-secondary">
                &laquo; Back to Opportunities
            </a>
        </div>
    </div>
</div>
@endsection
