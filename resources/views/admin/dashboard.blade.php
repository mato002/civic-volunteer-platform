@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <!-- Organizations -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-gray-500 text-sm font-medium mb-2">Organizations</div>
        <div class="text-3xl font-bold text-gray-900">{{ $organizationsCount ?? 0 }}</div>
    </div>

    <!-- Opportunities -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-gray-500 text-sm font-medium mb-2">Opportunities</div>
        <div class="text-3xl font-bold text-gray-900">{{ $opportunitiesCount ?? 0 }}</div>
    </div>

    <!-- Volunteers -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-gray-500 text-sm font-medium mb-2">Volunteers</div>
        <div class="text-3xl font-bold text-gray-900">{{ $volunteersCount ?? 0 }}</div>
    </div>

    <!-- Registrations -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-gray-500 text-sm font-medium mb-2">Registrations</div>
        <div class="text-3xl font-bold text-gray-900">{{ $registrationsCount ?? 0 }}</div>
    </div>
</div>
@endsection
