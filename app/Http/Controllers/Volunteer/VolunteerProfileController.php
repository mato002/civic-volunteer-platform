<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerProfileController extends Controller
{
    public function index()
    {
        $volunteer = Auth::guard('volunteer')->user();
        return view('volunteer.profile', compact('volunteer'));
    }

    public function update(Request $request)
    {
        $volunteer = Auth::guard('volunteer')->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:volunteers,email,' . $volunteer->id,
            // Add other fields as needed
        ]);

        $volunteer->update($data);

        return redirect()->route('volunteer.profile')->with('success', 'Profile updated successfully.');
    }
}
