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

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts
        $usersCount = User::count();
        $programsCount = Program::count();
        $opportunitiesCount = Opportunity::count();
        $schoolsCount = School::count();
        $assessmentsCount = PathfinderResponse::count();
        $mentorsCount = User::where('role', 'mentor')->count();
        $studentsCount = User::where('role', 'student')->count();
        $sessionsCount = MentorshipSession::count();

        // Get recent activity
        $recentUsers = User::latest()->take(5)->get();
        $recentPrograms = Program::latest()->take(5)->get();
        $recentOpportunities = Opportunity::latest()->take(5)->get();
        $recentAssessments = PathfinderResponse::with('user')->latest()->take(5)->get();

        // Get monthly stats
        $currentMonth = Carbon::now();
        $usersThisMonth = User::whereMonth('created_at', $currentMonth->month)->count();
        $assessmentsThisMonth = PathfinderResponse::whereMonth('created_at', $currentMonth->month)->count();
        $sessionsThisMonth = MentorshipSession::whereMonth('created_at', $currentMonth->month)->count();

        return view('admin.dashboard', compact(
            'usersCount',
            'programsCount', 
            'opportunitiesCount',
            'schoolsCount',
            'assessmentsCount',
            'mentorsCount',
            'studentsCount',
            'sessionsCount',
            'recentUsers',
            'recentPrograms',
            'recentOpportunities',
            'recentAssessments',
            'usersThisMonth',
            'assessmentsThisMonth',
            'sessionsThisMonth'
        ));
    }
} 