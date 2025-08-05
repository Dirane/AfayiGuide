<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PathfinderResponse;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = PathfinderResponse::with('user')->latest()->paginate(10);
        return view('admin.assessments.index', compact('assessments'));
    }

    public function show(PathfinderResponse $assessment)
    {
        $assessment->load('user');
        return view('admin.assessments.show', compact('assessment'));
    }

    public function destroy(PathfinderResponse $assessment)
    {
        $assessment->delete();

        return redirect()->route('admin.assessments.index')
            ->with('success', 'Assessment deleted successfully.');
    }

    public function export()
    {
        $assessments = PathfinderResponse::with('user')->get();
        
        $filename = 'assessments_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($assessments) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, [
                'ID',
                'User Name',
                'User Email',
                'Academic Background',
                'Field of Interest',
                'Career Goals',
                'Aspirations',
                'Skills',
                'Interests',
                'Preferred Location',
                'Budget Range',
                'Additional Notes',
                'Created At'
            ]);

            // Add data
            foreach ($assessments as $assessment) {
                fputcsv($file, [
                    $assessment->id,
                    $assessment->user->name ?? 'N/A',
                    $assessment->user->email ?? 'N/A',
                    $assessment->academic_background,
                    $assessment->field_of_interest,
                    $assessment->career_goals,
                    $assessment->aspirations,
                    $assessment->skills,
                    $assessment->interests,
                    $assessment->preferred_location,
                    $assessment->budget_range,
                    $assessment->additional_notes,
                    $assessment->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
} 