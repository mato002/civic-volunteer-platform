@extends('layouts.organization')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Manage Opportunities</h1>

    <a href="{{ route('org.opportunities.create') }}" class="text-blue-600 hover:underline mb-4 inline-block">+ Post New Opportunity</a>

    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-3 text-left">Title</th>
                <th class="px-4 py-3 text-left">Location</th>
                <th class="px-4 py-3 text-left">Date</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Example row --}}
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">Beach Cleanup</td>
                <td class="px-4 py-3">Ocean Bay</td>
                <td class="px-4 py-3">2025-06-15</td>
                <td class="px-4 py-3 text-center space-x-2">
                    <a href="#" class="text-blue-600 hover:underline">Edit</a>
                    <form action="#" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this opportunity?')">Delete</button>
                    </form>
                </td>
            </tr>
            {{-- Repeat for real data --}}
        </tbody>
    </table>
@endsection
