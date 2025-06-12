@extends('layouts.organization')

@section('title', 'View Registrations')

@section('content')
<div class="content-area">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-3xl font-bold text-dark-color">
                    <i class="fas fa-users me-2"></i> View Registrations
                </h1>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="bg-light-color text-dark-color">
                        <tr>
                            <th class="px-4 py-3 text-left">Volunteer Name</th>
                            <th class="px-4 py-3 text-left">Opportunity</th>
                            <th class="px-4 py-3 text-left">Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Example row --}}
                        <tr class="border-b">
                            <td class="px-4 py-3">Jane Doe</td>
                            <td class="px-4 py-3">Beach Cleanup</td>
                            <td class="px-4 py-3">2025-05-25</td>
                        </tr>
                        {{-- Repeat with real data --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach((row, index) => {
            row.style.animation = `fadeIn 0.5s ease forwards ${index * 0.05}s`;
        });
    });
</script>
@endpush