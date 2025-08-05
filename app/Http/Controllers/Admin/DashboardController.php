<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\School;
use App\Models\Opportunity;
use App\Models\PathfinderResponse;
use App\Models\MentorshipSession;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // User statistics
        $totalUsers = User::count();
        $studentsCount = User::where('role', 'student')->count();
        $mentorsCount = User::where('role', 'mentor')->count();
        $adminsCount = User::where('role', 'admin')->count();
        
        // Content statistics
        $schoolsCount = School::count();
        $opportunitiesCount = Opportunity::count();
        $assessmentsCount = PathfinderResponse::count();
        $sessionsCount = MentorshipSession::count();
        
        // Monthly growth
        $lastMonth = Carbon::now()->subMonth();
        $usersGrowth = User::where('created_at', '>=', $lastMonth)->count();
        $assessmentsGrowth = PathfinderResponse::where('created_at', '>=', $lastMonth)->count();
        $sessionsGrowth = MentorshipSession::where('created_at', '>=', $lastMonth)->count();
        
        // Recent activity
        $recentUsers = User::latest()->take(5)->get();
        $recentAssessments = PathfinderResponse::with('user')->latest()->take(5)->get();
        $recentSessions = MentorshipSession::with(['student', 'mentor'])->latest()->take(5)->get();
        
        // Mentor statistics
        $activeMentors = User::where('role', 'mentor')->where('is_active', true)->count();
        $totalEarnings = MentorshipSession::where('payment_status', 'paid')->sum('session_fee');
        $sessionStatuses = [
            'pending' => MentorshipSession::where('status', 'pending')->count(),
            'confirmed' => MentorshipSession::where('status', 'confirmed')->count(),
            'completed' => MentorshipSession::where('status', 'completed')->count(),
            'cancelled' => MentorshipSession::where('status', 'cancelled')->count(),
        ];

        return view('admin.dashboard', compact(
            'totalUsers', 'studentsCount', 'mentorsCount', 'adminsCount',
            'schoolsCount', 'opportunitiesCount', 'assessmentsCount', 'sessionsCount',
            'usersGrowth', 'assessmentsGrowth', 'sessionsGrowth',
            'recentUsers', 'recentAssessments', 'recentSessions',
            'activeMentors', 'totalEarnings', 'sessionStatuses'
        ));
    }
} 