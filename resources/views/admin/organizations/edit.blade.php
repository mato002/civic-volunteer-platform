@extends('layouts.admin')

@section('title', 'Edit Organization')
@section('page-title', 'Edit Organization')

@section('content')
<form action="{{ route('admin.organizations.update', $organization) }}"
      method="POST" class="space-y-6 bg-white p-6 shadow rounded">
    @csrf @method('PUT')
    <div>
        <label class="block mb-1 font-medium">Name</label>
        <input name="name" value="{{ $organization->name }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" value="{{ $organization->email }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block mb-1 font-medium">Phone</label>
        <input name="phone" value="{{ $organization->phone }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block mb-1 font-medium">Address</label>
        <textarea name="address" class="w-full border rounded p-2">{{ $organization->address }}</textarea>
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
