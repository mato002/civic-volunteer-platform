<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpportunityController extends Controller
{
    // Show all opportunities for the logged-in org
    public function index()
    {
        $orgId = Auth::id(); // Assuming org user is authenticated
        $opportunities = Opportunity::where('organization_id', $orgId)->orderBy('start_date', 'desc')->get();

        return view('org.opportunities.index', compact('opportunities'));
    }

    // Show create form
    public function create()
    {
        return view('org.opportunities.create');
    }

    // Store new opportunity
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'description' => 'required|string',
        ]);

        Opportunity::create([
            'organization_id' => Auth::id(),
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('org.opportunities.index')->with('success', 'Opportunity posted successfully.');
    }

    // Show edit form
    public function edit(Opportunity $opportunity)
    {
        // Ensure the logged-in org owns this opportunity
        $this->authorizeOpportunity($opportunity);

        return view('org.opportunities.edit', compact('opportunity'));
    }

    // Update opportunity
    public function update(Request $request, Opportunity $opportunity)
    {
        $this->authorizeOpportunity($opportunity);

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'description' => 'required|string',
        ]);

        $opportunity->update([
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('org.opportunities.index')->with('success', 'Opportunity updated successfully.');
    }

    // Delete opportunity
    public function destroy(Opportunity $opportunity)
    {
        $this->authorizeOpportunity($opportunity);

        $opportunity->delete();

        return redirect()->route('org.opportunities.index')->with('success', 'Opportunity deleted successfully.');
    }

    // Helper to ensure logged-in org owns the opportunity
    private function authorizeOpportunity(Opportunity $opportunity)
    {
        if ($opportunity->organization_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
