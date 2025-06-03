<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
    $org = Auth::guard('organization')->user();

        // Example stats (adjust queries based on your data structure)
        $totalOpportunities = Opportunity::where('organization_id', $org->id)->count();
        $totalRegistrations = Registration::whereHas('opportunity', function($q) use ($org) {
            $q->where('organization_id', $org->id);
        })->count();

        $upcomingEvents = Opportunity::where('organization_id', $org->id)
                            ->whereDate('start_date', '>=', now())
                            ->count();

        return view('org.dashboard', compact('totalOpportunities', 'totalRegistrations', 'upcomingEvents'));
    }
}
