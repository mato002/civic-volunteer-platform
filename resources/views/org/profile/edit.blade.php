@extends('layouts.organization')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Organization Profile</h1>

    <form action="{{ route('org.profile.update') }}" method="POST" class="max-w-lg bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <label class="block mb-3">
            <span class="text-gray-700">Organization Name</span>
            <input type="text" name="name" value="{{ old('name', $org->name ?? '') }}" class="mt-1 block w-full border rounded p-2" required>
        </label>

        <label class="block mb-3">
            <span class="text-gray-700">Contact Email</span>
            <input type="email" name="email" value="{{ old('email', $org->email ?? '') }}" class="mt-1 block w-full border rounded p-2" required>
        </label>

        <label class="block mb-3">
            <span class="text-gray-700">Phone</span>
            <input type="text" name="phone" value="{{ old('phone', $org->phone ?? '') }}" class="mt-1 block w-full border rounded p-2">
        </label>

        <label class="block mb-3">
            <span class="text-gray-700">Bio / Description</span>
            <textarea name="bio" rows="4" class="mt-1 block w-full border rounded p-2">{{ old('bio', $org->bio ?? '') }}</textarea>
        </label>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Profile</button>
    </form>
@endsection
