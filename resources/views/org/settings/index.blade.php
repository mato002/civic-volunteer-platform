@extends('layouts.organization')

@section('title', 'Settings')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Organization Settings</h1>

    <div class="bg-white shadow-md rounded p-6 mb-6">
        <form method="POST" action="{{ route('org.settings.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-semibold text-gray-700">Organization Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-semibold text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold text-gray-700">About the Organization</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 mt-1">{{ old('description', auth()->user()->description) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
