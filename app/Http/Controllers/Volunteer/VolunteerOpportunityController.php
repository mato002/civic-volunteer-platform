<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;  // Make sure you have this model
use Illuminate\Http\Request;

class VolunteerOpportunityController extends Controller
{
public function index()
{
    // Eager load organization to avoid N+1 query problem
    $opportunities = Opportunity::with('organization')->get();
    return view('volunteer.opportunities.index', compact('opportunities'));
}

    public function show($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('volunteer.opportunities.show', compact('opportunity'));
    }
}
