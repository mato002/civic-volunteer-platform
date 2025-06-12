<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:organization');
    }

    public function index()
    {
        $org = Auth::guard('organization')->user();

        // Stats
        $totalOpportunities = Opportunity::where('organization_id', $org->id)->count();
        $totalRegistrations = Registration::whereHas('opportunity', function ($q) use ($org) {
            $q->where('organization_id', $org->id);
        })->count();
        $upcomingEvents = Opportunity::where('organization_id', $org->id)
            ->whereDate('start_date', '>=', now())
            ->count();

        // Recent Opportunities (last 5)
        $recentOpportunities = Opportunity::where('organization_id', $org->id)
            ->withCount('registrations')
            ->latest()
            ->take(5)
            ->get();

        // Volunteer Engagement (unique volunteers in the last 30 days)
        $recentVolunteers = Registration::whereHas('opportunity', function ($q) use ($org) {
            $q->where('organization_id', $org->id);
        })
            ->where('created_at', '>=', now()->subDays(30))
            ->distinct('volunteer_id')
            ->count();

        return view('org.dashboard', compact(
            'totalOpportunities',
            'totalRegistrations',
            'upcomingEvents',
            'recentOpportunities',
            'recentVolunteers'
        ));
    }
}