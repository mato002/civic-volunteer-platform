@extends('layouts.volunteer')

@section('content')
<h2>Feedback Details</h2>

<p><strong>Opportunity:</strong> {{ $feedback->opportunity->title ?? 'N/A' }}</p>
<p><strong>Rating:</strong> {{ $feedback->rating }}/5</p>
<p><strong>Comments:</strong></p>
<p>{{ $feedback->comments ?? 'No comments' }}</p>

<a href="{{ route('volunteer.feedback.index') }}" class="btn btn-secondary mt-3">Back to My Feedback</a>
@endsection
