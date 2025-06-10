<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerOpportunityController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:volunteer');
    }

    /**
     * Display a listing of volunteer opportunities.
     */
    public function index(Request $request)
    {
        // Eager load organization and apply filters/pagination
        $query = Opportunity::with('organization');

        // Optional: Add filters (e.g., by category or location)
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        if ($request->has('location') && $request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Paginate results for better performance
        $opportunities = $query->latest()->paginate(10);

        return view('volunteer.opportunities.index', compact('opportunities'));
    }

    /**
     * Display the specified volunteer opportunity.
     */
    public function show($id)
    {
        // Eager load organization to avoid N+1 query problem
        $opportunity = Opportunity::with('organization')->findOrFail($id);

        return view('volunteer.opportunities.show', compact('opportunity'));
    }

    /**
     * Apply for a volunteer opportunity.
     */
    public function apply(Request $request, Opportunity $opportunity)
    {
        $volunteer = Auth::guard('volunteer')->user();

        // Check if already registered
        if ($volunteer->registrations()->where('opportunity_id', $opportunity->id)->exists()) {
            return redirect()->route('volunteer.opportunities.show', $opportunity->id)
                ->with('error', 'You have already applied for this opportunity.');
        }

        // Create registration
        $registration = Registration::create([
            'volunteer_id' => $volunteer->id,
            'opportunity_id' => $opportunity->id,
            'status' => 'pending', // Adjust based on your workflow (e.g., 'confirmed' for auto-approval)
        ]);

        // Log activity for dashboard/profile
        $volunteer->opportunities()->create([
            'type' => 'signup',
            'description' => "Registered for {$opportunity->title}",
        ]);

        return redirect()->route('volunteer.registrations.index')
            ->with('success', 'Successfully applied for ' . $opportunity->title . '.');
    }
}