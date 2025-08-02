<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\School;
use App\Models\Program;
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
        $programsCount = Program::count();
        $opportunitiesCount = Opportunity::count();
        $assessmentsCount = PathfinderResponse::count();
        $sessionsCount = MentorshipSession::count();
        
        // Monthly growth
        $usersThisMonth = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $assessmentsThisMonth = PathfinderResponse::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $sessionsThisMonth = MentorshipSession::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        
        // Growth percentages
        $lastMonthUsers = User::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<', Carbon::now()->startOfMonth())->count();
        $userGrowth = $lastMonthUsers > 0 ? (($usersThisMonth - $lastMonthUsers) / $lastMonthUsers) * 100 : 0;
        
        $lastMonthAssessments = PathfinderResponse::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<', Carbon::now()->startOfMonth())->count();
        $assessmentGrowth = $lastMonthAssessments > 0 ? (($assessmentsThisMonth - $lastMonthAssessments) / $lastMonthAssessments) * 100 : 0;
        
        $lastMonthSessions = MentorshipSession::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<', Carbon::now()->startOfMonth())->count();
        $sessionGrowth = $lastMonthSessions > 0 ? (($sessionsThisMonth - $lastMonthSessions) / $lastMonthSessions) * 100 : 0;
        
        // Recent activity
        $recentUsers = User::latest()->take(5)->get();
        $recentAssessments = PathfinderResponse::with('user')->latest()->take(5)->get();
        $recentSessions = MentorshipSession::with(['student', 'mentor'])->latest()->take(5)->get();
        
        // Platform statistics
        $activeMentors = User::where('role', 'mentor')->where('is_active', true)->count();
        $totalEarnings = MentorshipSession::where('status', 'completed')->sum('price');
        $pendingSessions = MentorshipSession::where('status', 'pending')->count();
        $completedSessions = MentorshipSession::where('status', 'completed')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'studentsCount',
            'mentorsCount',
            'adminsCount',
            'schoolsCount',
            'programsCount',
            'opportunitiesCount',
            'assessmentsCount',
            'sessionsCount',
            'usersThisMonth',
            'assessmentsThisMonth',
            'sessionsThisMonth',
            'userGrowth',
            'assessmentGrowth',
            'sessionGrowth',
            'recentUsers',
            'recentAssessments',
            'recentSessions',
            'activeMentors',
            'totalEarnings',
            'pendingSessions',
            'completedSessions'
        ));
    }
} 