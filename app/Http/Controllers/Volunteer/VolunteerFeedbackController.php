<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Feedback; // Your model for feedback/reviews
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerFeedbackController extends Controller
{
    public function index()
    {
        $volunteerId = Auth::guard('volunteer')->id();
        $feedbacks = Feedback::where('volunteer_id', $volunteerId)->get();

        return view('volunteer.feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('volunteer.feedback.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'opportunity_id' => 'required|exists:opportunities,id',
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        $data['volunteer_id'] = Auth::guard('volunteer')->id();

        Feedback::create($data);

        return redirect()->route('volunteer.feedback.index')->with('success', 'Feedback submitted successfully.');
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('volunteer.feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        $feedback->update($data);

        return redirect()->route('volunteer.feedback.index')->with('success', 'Feedback updated successfully.');
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('volunteer.feedback.show', compact('feedback'));
    }
}
