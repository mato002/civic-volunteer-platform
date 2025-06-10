<?php

namespace App\Http\Controllers\Volunteer;
use App\Models\Volunteer;
use App\Http\Controllers\Controller;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerProfileController extends Controller
{
    public function index()
    {
        $volunteer = Auth::guard('volunteer')->user();
        return view('volunteer.profile', [
            'volunteer' => $volunteer,
            'recentOpportunities' => $volunteer->opportunities()->latest()->take(5)->get(),
        ]);
    }

    /**
     * Update the volunteer's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:volunteers,email,' . Auth::guard('volunteer')->id(),
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
        ]);

        Auth::guard('volunteer')->user()->update($request->only(['name', 'email', 'phone', 'location']));
        return redirect()->route('volunteer.profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Update the volunteer's profile picture.
     */
    public function updatePicture(Request $request)
    {
        $request->validate(['profile_picture' => 'required|image|max:2048']);

        $user = Auth::guard('volunteer')->user();
        // Delete old picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->update(['profile_picture' => $path]);

        return redirect()->route('volunteer.profile')->with('success', 'Profile picture updated.');
    }

    /**
     * Update the volunteer's skills and preferences.
     */
    public function updateSkills(Request $request)
    {
        $request->validate([
            'skills' => 'nullable|array',
            'skills.*' => 'in:' . implode(',', config('volunteer.skills', [])),
            'preferences' => 'nullable|array',
            'preferences.*' => 'in:in_person,virtual,weekends',
        ]);

        Auth::guard('volunteer')->user()->update([
            'skills' => $request->skills ?? [],
            'preferences' => $request->preferences ?? [],
        ]);

        return redirect()->route('volunteer.profile')->with('success', 'Skills and preferences updated.');
    }

    /**
     * Update the volunteer's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::guard('volunteer')->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->route('volunteer.profile')->with('success', 'Password updated successfully.');
    }

    /**
     * Enable two-factor authentication.
     */
    public function enable2FA(Request $request)
    {
        $user = Auth::guard('volunteer')->user();
        if ($user->two_factor_enabled) {
            return redirect()->route('volunteer.profile')->with('success', '2FA is already enabled.');
        }

        $google2fa = new Google2FA();
        $secret = $google2fa->generateSecretKey();
        $user->update([
            'two_factor_secret' => $secret,
            'two_factor_enabled' => true,
        ]);

        // Optionally, generate QR code for the user to scan
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        // You may want to display the QR code in a view
        return redirect()->route('volunteer.profile')->with('success', '2FA enabled. Scan the QR code in your authenticator app.');
    }

    /**
     * Disable two-factor authentication.
     */
    public function disable2FA(Request $request)
    {
        $user = Auth::guard('volunteer')->user();
        $user->update([
            'two_factor_secret' => null,
            'two_factor_enabled' => false,
        ]);

        return redirect()->route('volunteer.profile')->with('success', '2FA disabled.');
    }
}


