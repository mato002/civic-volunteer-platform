@extends('layouts.organization')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    <p>Welcome to your organization dashboard.</p>
    <p>Here you can view event stats and volunteer engagement.</p>

    <!-- Example stats section -->
    <div class="grid grid-cols-3 gap-6 mt-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Total Opportunities</h2>
            <p class="text-3xl font-bold">15</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Volunteers Registered</h2>
            <p class="text-3xl font-bold">120</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Upcoming Events</h2>
            <p class="text-3xl font-bold">3</p>
        </div>
    </div>
@endsection
