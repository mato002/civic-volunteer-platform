<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = User::where('id')->get();
        return view('admin.volunteers.index', compact('volunteers'));
    }

    public function show(User $volunteer)
    {
        return view('admin.volunteers.show', compact('volunteer'));
    }

    public function edit(User $volunteer)
    {
        return view('admin.volunteers.edit', compact('volunteer'));
    }

    public function update(Request $request, User $volunteer)
    {
        $volunteer->update($request->only(['name', 'email']));
        return redirect()->route('admin.volunteers.index')->with('success', 'Volunteer updated.');
    }

    public function destroy(User $volunteer)
    {
        $volunteer->delete();
        return back()->with('success', 'Volunteer removed.');
    }
}
