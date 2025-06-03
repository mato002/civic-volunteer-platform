@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <!-- Organizations -->
    <div class="col-md-3 mb-4">
        <div class="card border-left-blue shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-xs font-weight-500 text-blue-600 text-uppercase mb-1">
                            Organizations
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $organizationsCount ?? 0 }}
                        </div>
                    </div>
                    <div class="icon-circle bg-blue-100 text-blue-600">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-xs font-weight-500 text-blue-600">
                        <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Opportunities -->
    <div class="col-md-3 mb-4">
        <div class="card border-left-green shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-xs font-weight-500 text-green-600 text-uppercase mb-1">
                            Opportunities
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $opportunitiesCount ?? 0 }}
                        </div>
                    </div>
                    <div class="icon-circle bg-green-100 text-green-600">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-xs font-weight-500 text-green-600">
                        <i class="fas fa-arrow-up mr-1"></i> 24% from last month
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Volunteers -->
    <div class="col-md-3 mb-4">
        <div class="card border-left-purple shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-xs font-weight-500 text-purple-600 text-uppercase mb-1">
                            Volunteers
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $volunteersCount ?? 0 }}
                        </div>
                    </div>
                    <div class="icon-circle bg-purple-100 text-purple-600">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-xs font-weight-500 text-purple-600">
                        <i class="fas fa-arrow-up mr-1"></i> 8% from last month
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrations -->
    <div class="col-md-3 mb-4">
        <div class="card border-left-amber shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-xs font-weight-500 text-amber-600 text-uppercase mb-1">
                            Registrations
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $registrationsCount ?? 0 }}
                        </div>
                    </div>
                    <div class="icon-circle bg-amber-100 text-amber-600">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-xs font-weight-500 text-amber-600">
                        <i class="fas fa-arrow-up mr-1"></i> 32% from last month
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold">Recent Activity</h6>
        <a href="#" class="btn btn-sm btn-link">View All</a>
    </div>
    <div class="card-body">
        <div class="activity-list">
            <div class="activity-item d-flex border-bottom pb-3 mb-3">
                <div class="icon-circle bg-blue-100 text-blue-600 mr-3">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div>
                    <div class="small text-gray-800 font-weight-500">New volunteer registered</div>
                    <div class="small text-gray-500">John Doe - 2 hours ago</div>
                </div>
            </div>
            <div class="activity-item d-flex border-bottom pb-3 mb-3">
                <div class="icon-circle bg-green-100 text-green-600 mr-3">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <div class="small text-gray-800 font-weight-500">New opportunity created</div>
                    <div class="small text-gray-500">Community Cleanup - 5 hours ago</div>
                </div>
            </div>
            <div class="activity-item d-flex border-bottom pb-3 mb-3">
                <div class="icon-circle bg-purple-100 text-purple-600 mr-3">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <div class="small text-gray-800 font-weight-500">New organization joined</div>
                    <div class="small text-gray-500">Green Earth Foundation - Yesterday</div>
                </div>
            </div>
            <div class="activity-item d-flex">
                <div class="icon-circle bg-amber-100 text-amber-600 mr-3">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div>
                    <div class="small text-gray-800 font-weight-500">5 new registrations</div>
                    <div class="small text-gray-500">For Food Drive event - Yesterday</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold">Registrations Trend</h6>
                <select class="form-control form-control-sm w-auto">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option selected>Last 90 days</option>
                </select>
            </div>
            <div class="card-body">
                <div class="chart-placeholder" style="height: 300px;">
                    [Chart Placeholder - Would display a line chart here]
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold">Opportunities by Category</h6>
                <select class="form-control form-control-sm w-auto">
                    <option>All Categories</option>
                    <option selected>Most Popular</option>
                </select>
            </div>
            <div class="card-body">
                <div class="chart-placeholder" style="height: 300px;">
                    [Chart Placeholder - Would display a bar chart here]
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Additional styles to complement the admin layout */
    .border-left-blue {
        border-left: 4px solid #3b82f6 !important;
    }
    .border-left-green {
        border-left: 4px solid #10b981 !important;
    }
    .border-left-purple {
        border-left: 4px solid #8b5cf6 !important;
    }
    .border-left-amber {
        border-left: 4px solid #f59e0b !important;
    }
    .icon-circle {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    .chart-placeholder {
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        border-radius: 4px;
    }
    .text-blue-600 { color: #3b82f6; }
    .text-green-600 { color: #10b981; }
    .text-purple-600 { color: #8b5cf6; }
    .text-amber-600 { color: #f59e0b; }
    .bg-blue-100 { background-color: #dbeafe; }
    .bg-green-100 { background-color: #d1fae5; }
    .bg-purple-100 { background-color: #ede9fe; }
    .bg-amber-100 { background-color: #fef3c7; }
</style>
@endsection