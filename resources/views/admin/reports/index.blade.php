@extends('layouts.admin') {{-- Assuming your layout is in layouts/admin.blade.php --}}

@section('title', 'Reports & Analytics')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">📊 Reports & Analytics</h1>

    <div class="row">
        <!-- Card: Total Organizations -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Organizations</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $organizationsCount }}</h5>
                </div>
            </div>
        </div>

        <!-- Card: Total Opportunities -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Opportunities</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $opportunitiesCount }}</h5>
                </div>
            </div>
        </div>

        <!-- Card: Total Volunteers -->
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Total Volunteers</div>
                <div class="card-body">
                </div>
            </div>
        </div>

        <!-- Card: Total Registrations -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Registrations</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $registrationsCount }}</h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Placeholder for charts --}}
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Participation Trends</div>
                <div class="card-body">
                    <canvas id="participationChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('participationChart').getContext('2d');
    const participationChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($reportLabels) !!},
            datasets: [{
                label: 'Volunteer Registrations',
                data: {!! json_encode($reportData) !!},
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.3,
            }]
        }
    });
</script>
@endpush
