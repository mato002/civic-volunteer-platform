@extends('layouts.volunteer')

@section('content')
<h2>My Profile</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('volunteer.profile.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', $volunteer->name) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $volunteer->email) }}" class="form-control" required>
    </div>

    <!-- Add other profile fields as needed -->

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
@endsection
