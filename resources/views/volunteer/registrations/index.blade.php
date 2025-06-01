@extends('layouts.volunteer')

@section('content')
<h2>My Registrations</h2>

@if($registrations->isEmpty())
    <p>You have not registered for any events yet.</p>
@else
    <ul class="list-group">
        @foreach ($registrations as $registration)
            <li class="list-group-item">
                <a href="{{ route('volunteer.registrations.show', $registration->id) }}">
                    {{ $registration->opportunity->title ?? 'Event #' . $registration->id }}
                </a> - Registered on {{ $registration->created_at->format('M d, Y') }}
            </li>
        @endforeach
    </ul>
@endif

@endsection
