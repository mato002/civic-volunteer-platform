@extends('layouts.organization')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Post New Opportunity</h1>

    <form action="{{ route('org.opportunities.store') }}" method="POST" class="max-w-lg bg-white p-6 rounded shadow">
        @csrf

        <label class="block mb-3">
            <span class="text-gray-700">Title</span>
            <input type="text" name="title" class="mt-1 block w-full border rounded p-2" required>
        </label>

        <label class="block mb-3">
            <span class="text-gray-700">Location</span>
            <input type="text" name="location" class="mt-1 block w-full border rounded p-2" required>
        </label>

        <label class="block mb-3">
            <span class="text-gray-700">Date</span>
            <input type="date" name="date" class="mt-1 block w-full border rounded p-2" required>
        </label>

        <label class="block mb-3">
            <span class="text-gray-700">Description</span>
            <textarea name="description" rows="4" class="mt-1 block w-full border rounded p-2" required></textarea>
        </label>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Post Opportunity</button>
    </form>
@endsection
