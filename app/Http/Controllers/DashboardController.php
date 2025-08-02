<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Opportunity;
use App\Models\User;
use App\Models\PathfinderResponse;
use App\Models\MentorshipSession;
use App\Models\School;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'programsCount' => Program::active()->count(),
            'opportunitiesCount' => Opportunity::active()->count(),
            'schoolsCount' => School::active()->count(),
            'mentorsCount' => User::where('role', 'mentor')->where('is_active', true)->count(),
            'assessmentsCount' => PathfinderResponse::where('user_id', auth()->id())->count(),
            'featuredPrograms' => Program::featured()->active()->limit(3)->get(),
            'featuredOpportunities' => Opportunity::featured()->active()->limit(3)->get(),
            'featuredSchools' => School::featured()->active()->limit(3)->get(),
            'recentSessions' => MentorshipSession::where('student_id', auth()->id())
                ->with('mentor')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
            'recentAssessments' => PathfinderResponse::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
        ];

        return view('dashboard', $data);
    }
} 