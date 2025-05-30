@extends('layouts.admin')

@section('title', 'Settings')
@section('page-title', 'Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-6 shadow rounded space-y-6">
    @csrf
    <div>
        <label class="block font-medium mb-1">Site Name</label>
        <input name="site_name" value="{{ $settings['site_name'] ?? '' }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Primary Color</label>
        <input type="color" name="primary_color" value="{{ $settings['primary_color'] ?? '#1d4ed8' }}">
    </div>
    <div>
        <label class="block font-medium mb-1">Contact Email</label>
        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}"
               class="w-full border rounded p-2">
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update Settings</button>
</form>
@endsection
