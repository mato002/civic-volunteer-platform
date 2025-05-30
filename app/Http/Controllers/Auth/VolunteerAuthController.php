<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class VolunteerAuthController extends Controller
{
    // Show volunteer login form
    public function showLoginForm()
    {
        return view('auth.volunteer-login');
    }

    // Handle volunteer login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('volunteer')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('volunteer.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Show volunteer registration form
    public function showRegisterForm()
    {
        return view('auth.volunteer-register');
    }

    // Handle volunteer registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:volunteers,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $volunteer = Volunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('volunteer')->login($volunteer);

        return redirect(route('volunteer.dashboard'));
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('volunteer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
