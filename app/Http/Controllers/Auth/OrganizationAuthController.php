<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class OrganizationAuthController extends Controller
{
    // Show organization login form
    public function showLoginForm()
    {
        return view('auth.organization-login');
    }

    // Handle organization login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('organization')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect to intended URL or org dashboard
            return redirect()->intended(route('org.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Show organization registration form
    public function showRegisterForm()
    {
        return view('auth.organization-register');
    }

    // Handle organization registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:organizations,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $organization = Organization::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'pending',  // Optional: start with pending approval
        ]);

        Auth::guard('organization')->login($organization);

        // Redirect to org dashboard after registration
        return redirect()->intended(route('org.dashboard'));
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('organization')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('organization/login');
    }
}
