@extends('layouts.volunteer')

@section('content')
<h2>My Reviews & Feedback</h2>

<a href="{{ route('volunteer.feedback.create') }}" class="btn btn-primary mb-3">Submit New Feedback</a>

@if($feedbacks->isEmpty())
    <p>You haven't submitted any feedback yet.</p>
@else
    <ul class="list-group">
        @foreach ($feedbacks as $feedback)
            <li class="list-group-item">
                <a href="{{ route('volunteer.feedback.show', $feedback->id) }}">
                    Feedback for: {{ $feedback->opportunity->title ?? 'N/A' }}
                </a> - Rated: {{ $feedback->rating }}/5
            </li>
        @endforeach
    </ul>
@endif
@endsection
