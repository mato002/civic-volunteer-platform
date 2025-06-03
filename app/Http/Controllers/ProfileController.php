<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $org = Auth::user();
        return view('org.profile.edit', compact('org'));
    }

    public function update(Request $request)
    {
        $org = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
        ]);

        $org->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ]);

        return redirect()->route('org.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
