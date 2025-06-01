@extends('layouts.volunteer')

@section('content')
<h2>{{ $opportunity->title }}</h2>
<p>{{ $opportunity->description }}</p>

<!-- Add signup button or other details here -->

<a href="{{ route('volunteer.opportunities.index') }}" class="btn btn-secondary mt-3">Back to opportunities</a>
@endsection
