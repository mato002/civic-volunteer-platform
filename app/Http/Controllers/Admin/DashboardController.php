<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Opportunity;
use App\Models\Registration;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $organizationsCount = Organization::count();
        $opportunitiesCount = Opportunity::count();
        $registrationsCount = Registration::count();

        return view('admin.dashboard', compact(
            'organizationsCount',
            'opportunitiesCount',
            'registrationsCount',
        ));
    }
}
