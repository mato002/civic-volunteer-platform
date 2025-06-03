@extends('layouts.organization')

@section('content')
    <h1 class="text-3xl font-bold mb-6">View Registrations</h1>

    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-3 text-left">Volunteer Name</th>
                <th class="px-4 py-3 text-left">Opportunity</th>
                <th class="px-4 py-3 text-left">Registration Date</th>
            </tr>
        </thead>
        <tbody>
            {{-- Example row --}}
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">Jane Doe</td>
                <td class="px-4 py-3">Beach Cleanup</td>
                <td class="px-4 py-3">2025-05-25</td>
            </tr>
            {{-- Repeat with real data --}}
        </tbody>
    </table>
@endsection
