<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Opportunity;
use App\Models\PathfinderResponse;
use App\Models\MentorshipBooking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isMentor()) {
            return $this->mentorDashboard($user);
        }

        return $this->studentDashboard($user);
    }

    private function studentDashboard($user)
    {
        $stats = [
            'total_schools' => School::where('is_active', true)->count(),
            'total_opportunities' => Opportunity::where('is_active', true)->count(),
            'pathfinder_responses' => $user->pathfinderResponses()->count(),
            'mentorship_sessions' => $user->mentorshipBookings()->count(),
        ];

        $recentPathfinderResponses = $user->pathfinderResponses()
            ->latest()
            ->take(5)
            ->get();

        $recentMentorshipBookings = $user->mentorshipBookings()
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.student', compact('stats', 'recentPathfinderResponses', 'recentMentorshipBookings'));
    }

    private function mentorDashboard($user)
    {
        $stats = [
            'total_sessions' => $user->assignedMentorshipBookings()->count(),
            'completed_sessions' => $user->assignedMentorshipBookings()->where('status', 'completed')->count(),
            'total_earnings' => $user->assignedMentorshipBookings()->where('status', 'completed')->sum('amount'),
            'average_rating' => 0, // Will be calculated from completed sessions with ratings
        ];

        $recentSessions = $user->assignedMentorshipBookings()
            ->with('user')
            ->latest()
            ->take(5)
            ->get();

        $upcomingSessions = $user->assignedMentorshipBookings()
            ->with('user')
            ->where('status', 'assigned')
            ->where('scheduled_at', '>', now())
            ->orderBy('scheduled_at')
            ->take(5)
            ->get();

        return view('dashboard.mentor', compact('stats', 'recentSessions', 'upcomingSessions'));
    }
} 