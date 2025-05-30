<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Organization;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::with('organization')->get();
        return view('admin.opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        $organizations = Organization::all();
        return view('admin.opportunities.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'organization_id' => 'required',
        ]);
        Opportunity::create($request->all());
        return redirect()->route('admin.opportunities.index')->with('success', 'Opportunity created.');
    }

    public function edit(Opportunity $opportunity)
    {
        $organizations = Organization::all();
        return view('admin.opportunities.edit', compact('opportunity', 'organizations'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        $request->validate([
            'title' => 'required',
            'organization_id' => 'required',
        ]);
        $opportunity->update($request->all());
        return redirect()->route('admin.opportunities.index')->with('success', 'Opportunity updated.');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return back()->with('success', 'Opportunity deleted.');
    }
}
