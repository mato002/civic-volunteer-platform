@extends('layouts.admin')

@section('title', 'Organizations')
@section('page-title', 'Manage Organizations')

@section('content')
<a href="{{ route('admin.organizations.create') }}"
   class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Add Organization</a>

<table class="min-w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Phone</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($organizations as $org)
        <tr class="border-t">
            <td class="p-3">{{ $org->name }}</td>
            <td class="p-3">{{ $org->email }}</td>
            <td class="p-3">{{ $org->phone }}</td>
            <td class="p-3 space-x-2">
                <a href="{{ route('admin.organizations.edit', $org) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('admin.organizations.destroy', $org) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600"
                            onclick="return confirm('Delete this organization?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
