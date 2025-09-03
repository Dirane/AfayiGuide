<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MentorshipBooking;
use App\Models\User;
use Illuminate\Http\Request;

class MentorshipBookingController extends Controller
{
    public function index()
    {
        $bookings = MentorshipBooking::with(['user', 'assignedMentor'])
            ->latest()
            ->paginate(10);

        $stats = [
            'total' => MentorshipBooking::count(),
            'pending' => MentorshipBooking::where('status', 'pending')->count(),
            'assigned' => MentorshipBooking::where('status', 'assigned')->count(),
            'completed' => MentorshipBooking::where('status', 'completed')->count(),
            'cancelled' => MentorshipBooking::where('status', 'cancelled')->count(),
        ];

        return view('admin.mentorship-bookings.index', compact('bookings', 'stats'));
    }

    public function show(MentorshipBooking $mentorship_booking)
    {
        // Align with resource route parameter {mentorship_booking}
        $mentorship_booking->load(['user', 'assignedMentor']);
        $mentors = User::where('role', 'mentor')->get();

        // Keep view variable name $booking for compatibility
        $booking = $mentorship_booking;
        return view('admin.mentorship-bookings.show', compact('booking', 'mentors'));
    }

    public function assignMentor(Request $request, MentorshipBooking $booking)
    {
        $validated = $request->validate([
            'mentor_id' => 'required|exists:users,id',
            'scheduled_at' => 'nullable|date|after:now',
        ]);

        // Only allow assignment if current status is pending
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending bookings can be assigned.');
        }

        // Ensure selected user is a mentor
        $mentor = User::where('id', $validated['mentor_id'])->where('role', 'mentor')->first();
        if (!$mentor) {
            return redirect()->back()->with('error', 'Selected user is not a mentor.');
        }

        $booking->update([
            'assigned_mentor_id' => $mentor->id,
            'status' => 'assigned',
            'scheduled_at' => $validated['scheduled_at'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Mentor assigned successfully!');
    }

    public function updateStatus(Request $request, MentorshipBooking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,assigned,completed,cancelled',
            'completed_at' => 'nullable|date',
        ]);

        $data = ['status' => $validated['status']];
        
        if ($validated['status'] === 'completed') {
            $data['completed_at'] = $validated['completed_at'] ?? now();
        }

        $booking->update($data);

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }

    public function destroy(MentorshipBooking $mentorship_booking)
    {
        // Align with resource route parameter {mentorship_booking}
        $mentorship_booking->delete();
        return redirect()->route('admin.mentorship-bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
