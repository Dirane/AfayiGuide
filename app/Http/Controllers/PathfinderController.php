<?php

namespace App\Http\Controllers;

use App\Models\PathfinderResponse;
use App\Models\Program;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PathfinderController extends Controller
{
    public function index()
    {
        return view('pathfinder.index');
    }

    public function step1()
    {
        return view('pathfinder.step1');
    }

    public function step2()
    {
        // Check if required data from step 1 exists
        if (!session('pathfinder.academic_background') || !session('pathfinder.field_of_interest')) {
            return redirect()->route('pathfinder.step1');
        }
        return view('pathfinder.step2');
    }

    public function step2Post(Request $request)
    {
        $request->validate([
            'academic_background' => 'required|string',
            'field_of_interest' => 'required|string',
        ]);

        session([
            'pathfinder.academic_background' => $request->academic_background,
            'pathfinder.field_of_interest' => $request->field_of_interest,
        ]);

        return view('pathfinder.step2');
    }

    public function step3()
    {
        // Check if required data from step 2 exists
        if (!session('pathfinder.career_goals') || !session('pathfinder.aspirations')) {
            return redirect()->route('pathfinder.step1');
        }
        return view('pathfinder.step3');
    }

    public function step3Post(Request $request)
    {
        $request->validate([
            'career_goals' => 'required|string|min:10',
            'aspirations' => 'required|string|min:10',
        ]);

        session([
            'pathfinder.career_goals' => $request->career_goals,
            'pathfinder.aspirations' => $request->aspirations,
        ]);

        return view('pathfinder.step3');
    }

    public function step4()
    {
        // Check if required data from step 3 exists
        if (!session('pathfinder.career_goals') || !session('pathfinder.aspirations')) {
            return redirect()->route('pathfinder.step1');
        }
        return view('pathfinder.step4');
    }

    public function step4Post(Request $request)
    {
        session([
            'pathfinder.skills' => $request->skills ?? [],
            'pathfinder.interests' => $request->interests ?? [],
        ]);

        return view('pathfinder.step4');
    }

    public function step5()
    {
        // Check if required data from step 4 exists
        if (!session('pathfinder.career_goals') || !session('pathfinder.aspirations')) {
            return redirect()->route('pathfinder.step1');
        }
        return view('pathfinder.step5');
    }

    public function step5Post(Request $request)
    {
        session([
            'pathfinder.preferred_location' => $request->preferred_location,
            'pathfinder.budget_range_min' => $request->budget_range_min,
            'pathfinder.budget_range_max' => $request->budget_range_max,
        ]);

        return view('pathfinder.step5');
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'additional_notes' => 'nullable|string',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get all session data
        $data = [
            'user_id' => Auth::id(),
            'academic_background' => session('pathfinder.academic_background'),
            'field_of_interest' => session('pathfinder.field_of_interest'),
            'career_goals' => session('pathfinder.career_goals'),
            'aspirations' => session('pathfinder.aspirations'),
            'skills' => session('pathfinder.skills', []),
            'interests' => session('pathfinder.interests', []),
            'preferred_location' => session('pathfinder.preferred_location'),
            'budget_range_min' => session('pathfinder.budget_range_min'),
            'budget_range_max' => session('pathfinder.budget_range_max'),
            'additional_notes' => $request->additional_notes,
            'currency' => 'XAF',
            'is_completed' => true,
        ];

        // Create PathfinderResponse
        $pathfinderResponse = PathfinderResponse::create($data);

        // Generate recommendations and report
        $pathfinderResponse->generateRecommendations();
        $pathfinderResponse->generatePathwayReport();

        // Clear session data
        session()->forget([
            'pathfinder.academic_background',
            'pathfinder.field_of_interest',
            'pathfinder.career_goals',
            'pathfinder.aspirations',
            'pathfinder.skills',
            'pathfinder.interests',
            'pathfinder.preferred_location',
            'pathfinder.budget_range_min',
            'pathfinder.budget_range_max',
        ]);

        return view('pathfinder.results', compact('pathfinderResponse'));
    }

    public function downloadReport($id)
    {
        $pathfinderResponse = PathfinderResponse::findOrFail($id);
        
        if ($pathfinderResponse->user_id !== Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('reports.pathway', [
            'response' => $pathfinderResponse
        ]);
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pathway-report-' . Auth::user()->name . '.pdf');
    }

    public function reset()
    {
        session()->forget([
            'pathfinder.academic_background',
            'pathfinder.field_of_interest',
            'pathfinder.career_goals',
            'pathfinder.aspirations',
            'pathfinder.skills',
            'pathfinder.interests',
            'pathfinder.preferred_location',
            'pathfinder.budget_range_min',
            'pathfinder.budget_range_max',
        ]);

        return redirect()->route('pathfinder.step1');
    }
} 