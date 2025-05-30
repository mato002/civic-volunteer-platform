@extends('layouts.admin')

@section('title', 'Opportunities')
@section('page-title', 'Volunteer Opportunities')

@section('content')
<a href="{{ route('admin.opportunities.create') }}"
   class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Add Opportunity</a>

<table class="min-w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-3">Title</th>
            <th class="p-3">Organization</th>
            <th class="p-3">Dates</th>
            <th class="p-3">Status</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($opportunities as $opp)
        <tr class="border-t">
            <td class="p-3">{{ $opp->title }}</td>
            <td class="p-3">{{ $opp->organization->name }}</td>
            <td class="p-3">{{ $opp->start_date }} → {{ $opp->end_date }}</td>
            <td class="p-3">{{ ucfirst($opp->status) }}</td>
            <td class="p-3 space-x-2">
                <a href="{{ route('admin.opportunities.edit', $opp) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('admin.opportunities.destroy', $opp) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600"
                            onclick="return confirm('Delete this opportunity?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
