<?php

namespace App\Http\Controllers;

use App\Models\MentorshipBooking;
use Illuminate\Http\Request;

class MentorshipBookingController extends Controller
{
    public function index()
    {
        return view('mentorship.index');
    }

    public function create()
    {
        return view('mentorship.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'session_duration' => 'required|in:15min,30min,1hour',
            'session_topic' => 'nullable|string|max:500',
            'additional_notes' => 'nullable|string|max:1000',
        ]);

        // Get user information from authenticated user
        $user = auth()->user();

        // Check if user has WhatsApp number or phone number
        if (empty($user->whatsapp_number) && empty($user->phone)) {
            return back()->withErrors([
                'whatsapp_number' => 'Please add your WhatsApp number or phone number to your profile before booking a mentorship session.'
            ])->withInput();
        }

        // Calculate amount based on duration
        $amount = match($validated['session_duration']) {
            '15min' => 1000,
            '30min' => 1500,
            '1hour' => 2500,
            default => 1000,
        };

        $booking = MentorshipBooking::create([
            'user_id' => $user->id,
            'full_name' => $user->full_name ?? $user->name,
            'whatsapp_number' => $user->whatsapp_number ?? $user->phone ?? 'Not provided',
            'email' => $user->email,
            'session_duration' => $validated['session_duration'],
            'amount' => $amount,
            'session_topic' => $validated['session_topic'],
            'additional_notes' => $validated['additional_notes'],
            'status' => 'pending',
        ]);

        return redirect()->route('mentorship.success', $booking)->with('success', 'Your mentorship session has been booked successfully! We will contact you soon to confirm the details.');
    }

    public function success(MentorshipBooking $booking)
    {
        return view('mentorship.success', compact('booking'));
    }

    public function myBookings()
    {
        $bookings = auth()->user()->mentorshipBookings()->latest()->get();
        return view('mentorship.my-bookings', compact('bookings'));
    }
}
