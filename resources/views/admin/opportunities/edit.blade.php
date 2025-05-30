@extends('layouts.admin')

@section('title', 'Edit Opportunity')
@section('page-title', 'Edit Opportunity')

@section('content')
<form action="{{ route('admin.opportunities.update', $opportunity) }}" method="POST"
      class="bg-white p-6 shadow rounded space-y-6">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium mb-1">Title</label>
        <input name="title" value="{{ $opportunity->title }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Organization</label>
        <select name="organization_id" class="w-full border rounded p-2">
            @foreach ($organizations as $org)
                <option value="{{ $org->id }}" @selected($org->id == $opportunity->organization_id)>
                    {{ $org->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium mb-1">Start Date</label>
            <input type="date" name="start_date" value="{{ $opportunity->start_date }}"
                   class="w-full border rounded p-2">
        </div>
        <div>
            <label class="block font-medium mb-1">End Date</label>
            <input type="date" name="end_date" value="{{ $opportunity->end_date }}"
                   class="w-full border rounded p-2">
        </div>
    </div>
    <div>
        <label class="block font-medium mb-1">Location</label>
        <input name="location" value="{{ $opportunity->location }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Description</label>
        <textarea name="description" class="w-full border rounded p-2" rows="4">
            {{ $opportunity->description }}
        </textarea>
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
