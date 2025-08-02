<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use App\Models\Opportunity;
use App\Models\School;
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
        $totalPrograms = Program::count();
        $totalOpportunities = Opportunity::count();
        $totalSchools = School::count();
        $totalAssessments = PathfinderResponse::count();
        $totalSessions = MentorshipSession::count();

        // Monthly growth
        $currentMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();
        
        $usersThisMonth = User::whereMonth('created_at', $currentMonth->month)->count();
        $usersLastMonth = User::whereMonth('created_at', $lastMonth->month)->count();
        $userGrowth = $usersLastMonth > 0 ? (($usersThisMonth - $usersLastMonth) / $usersLastMonth) * 100 : 0;

        $assessmentsThisMonth = PathfinderResponse::whereMonth('created_at', $currentMonth->month)->count();
        $assessmentsLastMonth = PathfinderResponse::whereMonth('created_at', $lastMonth->month)->count();
        $assessmentGrowth = $assessmentsLastMonth > 0 ? (($assessmentsThisMonth - $assessmentsLastMonth) / $assessmentsLastMonth) * 100 : 0;

        // User distribution
        $studentsCount = User::where('role', 'student')->count();
        $mentorsCount = User::where('role', 'mentor')->count();
        $adminsCount = User::where('role', 'admin')->count();

        // Recent activity
        $recentUsers = User::latest()->take(5)->get();
        $recentAssessments = PathfinderResponse::with('user')->latest()->take(5)->get();
        $recentSessions = MentorshipSession::with(['student', 'mentor'])->latest()->take(5)->get();

        return view('admin.reports.index', compact(
            'totalUsers',
            'totalPrograms',
            'totalOpportunities',
            'totalSchools',
            'totalAssessments',
            'totalSessions',
            'usersThisMonth',
            'userGrowth',
            'assessmentsThisMonth',
            'assessmentGrowth',
            'studentsCount',
            'mentorsCount',
            'adminsCount',
            'recentUsers',
            'recentAssessments',
            'recentSessions'
        ));
    }

    public function users()
    {
        $users = User::withCount('pathfinderResponses')
            ->withCount('mentorshipSessions')
            ->latest()
            ->paginate(20);

        $userStats = [
            'total' => User::count(),
            'students' => User::where('role', 'student')->count(),
            'mentors' => User::where('role', 'mentor')->count(),
            'admins' => User::where('role', 'admin')->count(),
            'active' => User::where('is_active', true)->count(),
            'inactive' => User::where('is_active', false)->count(),
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
            'thisMonth' => PathfinderResponse::whereMonth('created_at', Carbon::now()->month)->count(),
            'lastMonth' => PathfinderResponse::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
            'thisWeek' => PathfinderResponse::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
        ];

        return view('admin.reports.assessments', compact('assessments', 'assessmentStats'));
    }
} 