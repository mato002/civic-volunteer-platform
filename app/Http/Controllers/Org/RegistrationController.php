<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $org = Auth::user();

        // Fetch registrations for this org's opportunities
        $registrations = Registration::whereHas('opportunity', function($query) use ($org) {
            $query->where('organization_id', $org->id);
        })->with(['volunteer', 'opportunity'])->latest()->get();

        return view('org.registrations.index', compact('registrations'));
    }
}
