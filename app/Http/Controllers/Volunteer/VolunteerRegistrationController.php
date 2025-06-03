<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Registration; // Your model for registrations
use Illuminate\Support\Facades\Auth;

class VolunteerRegistrationController extends Controller
{
    public function index()
    {
        $volunteerId = Auth::guard('volunteer')->id();
        $registrations = Registration::where('volunteer_id', $volunteerId)->get();

        return view('volunteer.registrations.index', compact('registrations'));
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        // Optionally check ownership
        return view('volunteer.registrations.show', compact('registration'));
    }
}
