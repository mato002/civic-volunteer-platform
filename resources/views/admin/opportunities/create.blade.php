@extends('layouts.admin')

@section('title', 'Add Opportunity')
@section('page-title', 'Add New Opportunity')

@section('content')
<form action="{{ route('admin.opportunities.store') }}" method="POST" class="bg-white p-6 shadow rounded space-y-6">
    @csrf
    <div>
        <label class="block font-medium mb-1">Title</label>
        <input name="title" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Organization</label>
        <select name="organization_id" class="w-full border rounded p-2">
            @foreach ($organizations as $org)
                <option value="{{ $org->id }}">{{ $org->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium mb-1">Start Date</label>
            <input type="date" name="start_date" class="w-full border rounded p-2">
        </div>
        <div>
            <label class="block font-medium mb-1">End Date</label>
            <input type="date" name="end_date" class="w-full border rounded p-2">
        </div>
    </div>
    <div>
        <label class="block font-medium mb-1">Location</label>
        <input name="location" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Description</label>
        <textarea name="description" class="w-full border rounded p-2" rows="4"></textarea>
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
