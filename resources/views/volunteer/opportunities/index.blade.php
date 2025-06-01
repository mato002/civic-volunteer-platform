@extends('layouts.volunteer')

@section('content')
<h2>Browse Volunteer Opportunities</h2>

@if($opportunities->isEmpty())
    <p>No opportunities available at the moment.</p>
@else
    <ul class="list-group">
        @foreach ($opportunities as $opportunity)
            <li class="list-group-item">
                <a href="{{ route('volunteer.opportunities.show', $opportunity->id) }}">
                    {{ $opportunity->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endif

@endsection
