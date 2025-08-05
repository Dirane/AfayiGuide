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

class ReportController extends Controller
{
    public function index()
    {
        // Overall statistics
        $totalUsers = User::count();
        $totalSchools = School::count();
        $totalOpportunities = Opportunity::count();
        $totalAssessments = PathfinderResponse::count();
        $assessmentsCount = $totalAssessments; // Alias for view compatibility
        $totalSessions = MentorshipSession::count();
        $sessionsCount = $totalSessions; // Alias for view compatibility
        
        // User distribution
        $userDistribution = [
            'students' => User::where('role', 'student')->count(),
            'mentors' => User::where('role', 'mentor')->count(),
            'admins' => User::where('role', 'admin')->count(),
        ];
        
        // User counts for distribution
        $studentsCount = User::where('role', 'student')->count();
        $mentorsCount = User::where('role', 'mentor')->count();
        $adminsCount = User::where('role', 'admin')->count();
        $activeMentors = User::where('role', 'mentor')->where('is_active', true)->count();
        
        // Growth calculations
        $lastMonth = Carbon::now()->subMonth();
        $thisMonthUsers = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonthUsers = User::where('created_at', '>=', $lastMonth->startOfMonth())
            ->where('created_at', '<', Carbon::now()->startOfMonth())->count();
        $userGrowth = $lastMonthUsers > 0 ? (($thisMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100 : 0;
        
        $thisMonthAssessments = PathfinderResponse::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonthAssessments = PathfinderResponse::where('created_at', '>=', $lastMonth->startOfMonth())
            ->where('created_at', '<', Carbon::now()->startOfMonth())->count();
        $assessmentGrowth = $lastMonthAssessments > 0 ? (($thisMonthAssessments - $lastMonthAssessments) / $lastMonthAssessments) * 100 : 0;
        $assessmentsGrowth = $assessmentGrowth; // Alias for view compatibility
        
        $thisMonthSessions = MentorshipSession::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonthSessions = MentorshipSession::where('created_at', '>=', $lastMonth->startOfMonth())
            ->where('created_at', '<', Carbon::now()->startOfMonth())->count();
        $sessionGrowth = $lastMonthSessions > 0 ? (($thisMonthSessions - $lastMonthSessions) / $lastMonthSessions) * 100 : 0;
        $sessionsGrowth = $sessionGrowth; // Alias for view compatibility
        
        // Session statistics
        $pendingSessions = MentorshipSession::where('status', 'pending')->count();
        $completedSessions = MentorshipSession::where('status', 'completed')->count();
        $totalEarnings = MentorshipSession::where('payment_status', 'paid')->sum('session_fee');
        
        // Content counts
        $programsCount = 0; // Since programs table was removed
        $schoolsCount = School::count();
        $opportunitiesCount = Opportunity::count();
        
        // Recent activity
        $recentUsers = User::latest()->take(5)->get();
        $recentAssessments = PathfinderResponse::with('user')->latest()->take(5)->get();
        $recentSessions = MentorshipSession::with(['student', 'mentor'])->latest()->take(5)->get();
        
        // Monthly trends
        $monthlyUsers = User::selectRaw('strftime("%Y-%m", created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
            
        $monthlyAssessments = PathfinderResponse::selectRaw('strftime("%Y-%m", created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
            
        $monthlySessions = MentorshipSession::selectRaw('strftime("%Y-%m", created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.reports.index', compact(
            'totalUsers', 'totalSchools', 'totalOpportunities', 'totalAssessments', 'totalSessions',
            'userDistribution', 'monthlyUsers', 'monthlyAssessments', 'monthlySessions',
            'studentsCount', 'mentorsCount', 'adminsCount', 'activeMentors',
            'userGrowth', 'assessmentGrowth', 'sessionGrowth', 'assessmentsGrowth', 'sessionsGrowth',
            'pendingSessions', 'completedSessions', 'totalEarnings',
            'programsCount', 'schoolsCount', 'opportunitiesCount', 'assessmentsCount', 'sessionsCount',
            'recentUsers', 'recentAssessments', 'recentSessions'
        ));
    }

    public function users()
    {
        $users = User::withCount(['pathfinderResponses', 'mentorshipSessionsAsStudent'])
            ->latest()
            ->paginate(20);
            
        $userStats = [
            'total' => User::count(),
            'active' => User::where('is_active', true)->count(),
            'students' => User::where('role', 'student')->count(),
            'mentors' => User::where('role', 'mentor')->count(),
            'admins' => User::where('role', 'admin')->count(),
        ];

        return view('admin.reports.users', compact('users', 'userStats'));
    }

    public function assessments()
    {
        $assessments = PathfinderResponse::with('user')
            ->latest()
            ->paginate(20);
            
        $assessmentStats = [
            'total' => PathfinderResponse::count(),
            'this_month' => PathfinderResponse::where('created_at', '>=', Carbon::now()->startOfMonth())->count(),
            'last_month' => PathfinderResponse::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
                ->where('created_at', '<', Carbon::now()->startOfMonth())->count(),
        ];

        return view('admin.reports.assessments', compact('assessments', 'assessmentStats'));
    }
} 