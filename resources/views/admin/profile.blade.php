@extends('layouts.admin')

@section('title', 'Profile')
@section('page-title', 'Edit Profile')

@section('content')
<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 shadow rounded space-y-6 max-w-lg">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium mb-1">Name</label>
        <input name="name" value="{{ $admin->name }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ $admin->email }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Profile Photo</label>
        <input type="file" name="photo" class="border rounded p-2 w-full">
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save Changes</button>
</form>
@endsection
