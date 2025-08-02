<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Program;
use App\Models\Opportunity;
use App\Models\PathfinderResponse;
use App\Models\MentorshipSession;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
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
        // Student-specific data
        $recentAssessments = $user->pathfinderResponses()->latest()->take(5)->get();
        $bookedSessions = $user->studentSessions()->with('mentor')->latest()->take(5)->get();
        $totalAssessments = $user->pathfinderResponses()->count();
        $totalSessions = $user->studentSessions()->count();
        $upcomingSessions = $user->studentSessions()->where('scheduled_at', '>', now())->count();
        
        // Platform statistics
        $schoolsCount = School::count();
        $programsCount = Program::count();
        $opportunitiesCount = Opportunity::count();
        $mentorsCount = User::where('role', 'mentor')->where('is_active', true)->count();
        
        // Featured content
        $featuredSchools = School::inRandomOrder()->take(3)->get();
        $featuredPrograms = Program::where('is_active', true)->inRandomOrder()->take(3)->get();
        $featuredOpportunities = Opportunity::where('is_active', true)->inRandomOrder()->take(3)->get();

        return view('dashboard.student', compact(
            'user',
            'recentAssessments',
            'bookedSessions',
            'totalAssessments',
            'totalSessions',
            'upcomingSessions',
            'schoolsCount',
            'programsCount',
            'opportunitiesCount',
            'mentorsCount',
            'featuredSchools',
            'featuredPrograms',
            'featuredOpportunities'
        ));
    }

    private function mentorDashboard($user)
    {
        // Mentor-specific data
        $mentorshipSessions = $user->mentorshipSessions()->with('student')->latest()->take(10)->get();
        $totalSessions = $user->mentorshipSessions()->count();
        $completedSessions = $user->mentorshipSessions()->where('status', 'completed')->count();
        $pendingSessions = $user->mentorshipSessions()->where('status', 'pending')->count();
        $totalEarnings = $user->mentorshipSessions()->where('status', 'completed')->sum('price');
        
        // Recent assessments (mentors can view student assessments)
        $recentAssessments = PathfinderResponse::with('user')->latest()->take(5)->get();
        
        // Platform statistics
        $studentsCount = User::where('role', 'student')->count();
        $schoolsCount = School::count();
        $programsCount = Program::count();
        $opportunitiesCount = Opportunity::count();

        return view('dashboard.mentor', compact(
            'user',
            'mentorshipSessions',
            'totalSessions',
            'completedSessions',
            'pendingSessions',
            'totalEarnings',
            'recentAssessments',
            'studentsCount',
            'schoolsCount',
            'programsCount',
            'opportunitiesCount'
        ));
    }
} 