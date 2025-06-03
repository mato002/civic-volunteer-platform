@extends('layouts.volunteer')

@section('content')
<h2>Registration Details</h2>

<p><strong>Event:</strong> {{ $registration->opportunity->title ?? 'N/A' }}</p>
<p><strong>Registered On:</strong> {{ $registration->created_at->format('M d, Y') }}</p>

<a href="{{ route('volunteer.registrations.index') }}" class="btn btn-secondary mt-3">Back to My Registrations</a>
@endsection
