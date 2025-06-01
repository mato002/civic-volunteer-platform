@extends('layouts.volunteer')

@section('content')
<h2 class="mb-4">Browse Volunteer Opportunities</h2>

@if($opportunities->isEmpty())
    <div class="alert alert-info">
        No opportunities available at the moment. Please check back later.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Organization</th>
                    <th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Contact Email</th>
                    <th>Contact Phone</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opportunities as $opportunity)
                <tr>
                    <td>{{ $opportunity->title }}</td>
                    <td>{{ $opportunity->organization->name ?? 'N/A' }}</td>
                    <td>{{ $opportunity->location ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($opportunity->start_date)->format('M d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($opportunity->end_date)->format('M d, Y') }}</td>
                    <td>{{ $opportunity->organization->email ?? 'N/A' }}</td>
                    <td>{{ $opportunity->organization->phone ?? 'N/A' }}</td>
                    <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ \Illuminate\Support\Str::limit($opportunity->description, 100) }}
                    </td>
                    <td>
                        <a href="{{ route('volunteer.opportunities.show', $opportunity->id) }}" class="btn btn-sm btn-primary">
                            View Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
