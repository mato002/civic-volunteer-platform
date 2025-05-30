@extends('layouts.admin')

@section('title', 'Registrations')
@section('page-title', 'Volunteer Registrations')

@section('content')
<table class="min-w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-3">Volunteer</th>
            <th class="p-3">Opportunity</th>
            <th class="p-3">Status</th>
            <th class="p-3">Applied</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($registrations as $reg)
        <tr class="border-t">
            <td class="p-3">{{ $reg->volunteer->name }}</td>
            <td class="p-3">{{ $reg->opportunity->title }}</td>
            <td class="p-3">{{ ucfirst($reg->status) }}</td>
            <td class="p-3">{{ $reg->created_at->diffForHumans() }}</td>
            <td class="p-3 space-x-2">
                <form action="{{ route('admin.registrations.update', $reg) }}" method="POST" class="inline">
                    @csrf @method('PUT')
                    <select name="status" onchange="this.form.submit()" class="border rounded p-1">
                        <option value="pending"  @selected($reg->status=='pending')>Pending</option>
                        <option value="approved" @selected($reg->status=='approved')>Approved</option>
                        <option value="rejected" @selected($reg->status=='rejected')>Rejected</option>
                    </select>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
