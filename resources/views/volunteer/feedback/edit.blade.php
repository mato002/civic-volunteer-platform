@extends('layouts.volunteer')

@section('content')
<h2>Edit Feedback</h2>

<form method="POST" action="{{ route('volunteer.feedback.update', $feedback->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="rating" class="form-label">Rating (1 to 5)</label>
        <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" value="{{ $feedback->rating }}" required>
    </div>

    <div class="mb-3">
        <label for="comments" class="form-label">Comments (optional)</label>
        <textarea class="form-control" id="comments" name="comments">{{ $feedback->comments }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Feedback</button>
</form>
@endsection
