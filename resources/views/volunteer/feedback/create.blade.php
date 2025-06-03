@extends('layouts.volunteer')

@section('content')
<h2>Submit Feedback</h2>

<form method="POST" action="{{ route('volunteer.feedback.store') }}">
    @csrf

    <div class="mb-3">
        <label for="opportunity_id" class="form-label">Opportunity</label>
        <select name="opportunity_id" id="opportunity_id" class="form-select" required>
            <!-- Ideally, populate options dynamically -->
            @foreach(\App\Models\Opportunity::all() as $opportunity)
                <option value="{{ $opportunity->id }}">{{ $opportunity->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="rating" class="form-label">Rating (1 to 5)</label>
        <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" required>
    </div>

    <div class="mb-3">
        <label for="comments" class="form-label">Comments (optional)</label>
        <textarea class="form-control" id="comments" name="comments"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit Feedback</button>
</form>
@endsection
