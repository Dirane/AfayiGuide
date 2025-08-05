<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Opportunity;
use App\Models\PathfinderResponse;
use App\Models\MentorshipSession;
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
            'mentorship_sessions' => $user->mentorshipSessionsAsStudent()->count(),
        ];

        $recentPathfinderResponses = $user->pathfinderResponses()
            ->latest()
            ->take(5)
            ->get();

        $recentMentorshipSessions = $user->mentorshipSessionsAsStudent()
            ->with('mentor')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.student', compact('stats', 'recentPathfinderResponses', 'recentMentorshipSessions'));
    }

    private function mentorDashboard($user)
    {
        $stats = [
            'total_sessions' => $user->mentorshipSessionsAsMentor()->count(),
            'completed_sessions' => $user->mentorshipSessionsAsMentor()->where('status', 'completed')->count(),
            'total_earnings' => $user->mentorshipSessionsAsMentor()->where('payment_status', 'paid')->sum('session_fee'),
            'average_rating' => $user->mentorshipSessionsAsMentor()->whereNotNull('rating')->avg('rating'),
        ];

        $recentSessions = $user->mentorshipSessionsAsMentor()
            ->with('student')
            ->latest()
            ->take(5)
            ->get();

        $upcomingSessions = $user->mentorshipSessionsAsMentor()
            ->with('student')
            ->where('status', 'confirmed')
            ->where('scheduled_at', '>', now())
            ->orderBy('scheduled_at')
            ->take(5)
            ->get();

        return view('dashboard.mentor', compact('stats', 'recentSessions', 'upcomingSessions'));
    }
} 