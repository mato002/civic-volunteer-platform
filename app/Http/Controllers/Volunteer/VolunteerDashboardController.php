<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;

class VolunteerDashboardController extends Controller
{
    public function index()
    {
        // You can add logic to fetch active signups, etc.
        return view('volunteer.dashboard');
    }
}
