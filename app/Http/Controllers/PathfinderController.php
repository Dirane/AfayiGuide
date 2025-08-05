<?php

namespace App\Http\Controllers;

use App\Models\PathfinderResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class PathfinderController extends Controller
{
    public function index()
    {
        return view('pathfinder.index');
    }

    public function step1()
    {
        // Initialize pathfinder session data
        if (!session()->has('pathfinder_data')) {
            session(['pathfinder_data' => []]);
        }

        return view('pathfinder.step1');
    }

    public function step2(Request $request)
    {
        $validated = $request->validate([
            'academic_level' => 'required|string',
            'self_academic_rating' => 'required|string',
            'other_self_rating' => 'nullable|string',
            'peer_teacher_rating' => 'required|string',
            'other_peer_rating' => 'nullable|string',
            'fields_of_interest' => 'required|array|min:1',
            'fields_of_interest.*' => 'string',
            'other_fields' => 'nullable|string',
        ]);

        session(['pathfinder_data.step1' => $validated]);

        return view('pathfinder.step2');
    }

    public function step3(Request $request)
    {
        if (!session()->has('pathfinder_data.step1')) {
            return redirect()->route('pathfinder.step1');
        }

        $validated = $request->validate([
            'career_goals' => 'required|array|min:1',
            'career_goals.*' => 'string',
            'other_career_goals' => 'nullable|string',
            'work_environment' => 'required|string',
        ]);

        session(['pathfinder_data.step2' => $validated]);

        return view('pathfinder.step3');
    }

    public function step4(Request $request)
    {
        if (!session()->has('pathfinder_data.step2')) {
            return redirect()->route('pathfinder.step1');
        }

        $validated = $request->validate([
            'key_skills' => 'nullable|array',
            'key_skills.*' => 'string',
            'languages' => 'nullable|array',
            'languages.*' => 'string',
            'other_languages' => 'nullable|string',
        ]);

        session(['pathfinder_data.step3' => $validated]);

        return view('pathfinder.step4');
    }

    public function step5(Request $request)
    {
        if (!session()->has('pathfinder_data.step3')) {
            return redirect()->route('pathfinder.step1');
        }

        $validated = $request->validate([
            'preferred_locations' => 'required|array|min:1',
            'preferred_locations.*' => 'string',
            'other_location' => 'nullable|string',
            'study_mode' => 'required|string',
        ]);

        session(['pathfinder_data.step4' => $validated]);

        return view('pathfinder.step5');
    }

    public function generateReport(Request $request)
    {
        if (!session()->has('pathfinder_data.step4')) {
            return redirect()->route('pathfinder.step1');
        }

        $validated = $request->validate([
            'program_duration' => 'required|string',
            'program_level' => 'required|string',
            'additional_preferences' => 'nullable|array',
            'additional_preferences.*' => 'string',
            'additional_notes' => 'nullable|string',
        ]);

        // Combine all data
        $data = array_merge(
            session('pathfinder_data.step1', []),
            session('pathfinder_data.step2', []),
            session('pathfinder_data.step3', []),
            session('pathfinder_data.step4', []),
            $validated
        );

        // Convert arrays to JSON strings for storage
        $data['fields_of_interest'] = json_encode($data['fields_of_interest']);
        $data['career_goals'] = json_encode($data['career_goals']);
        $data['key_skills'] = json_encode($data['key_skills'] ?? []);
        $data['languages'] = json_encode($data['languages'] ?? []);
        $data['preferred_locations'] = json_encode($data['preferred_locations']);
        $data['additional_preferences'] = json_encode($data['additional_preferences'] ?? []);

        // Generate recommendations based on academic level
        $recommendations = $this->generateRecommendations($data);

        // Save to database
        $assessment = PathfinderResponse::create([
            'user_id' => auth()->id(),
            'academic_background' => json_encode([
                'academic_level' => $data['academic_level'],
                'self_academic_rating' => $data['self_academic_rating'],
                'other_self_rating' => $data['other_self_rating'] ?? '',
                'peer_teacher_rating' => $data['peer_teacher_rating'],
                'other_peer_rating' => $data['other_peer_rating'] ?? '',
                'fields_of_interest' => $data['fields_of_interest'],
                'other_fields' => $data['other_fields'] ?? '',
            ]),
            'field_of_interest' => $data['fields_of_interest'],
            'career_goals' => $data['career_goals'],
            'aspirations' => json_encode([]), // Add empty aspirations to satisfy NOT NULL constraint
            'skills' => json_encode([
                'key_skills' => $data['key_skills'],
                'languages' => $data['languages'],
                'other_languages' => $data['other_languages'] ?? '',
            ]),
            'interests' => json_encode([
                'work_environment' => $data['work_environment'],
                'preferred_locations' => $data['preferred_locations'],
                'study_mode' => $data['study_mode'],
                'program_duration' => $data['program_duration'],
                'program_level' => $data['program_level'],
            ]),
            'preferred_location' => $data['preferred_locations'], // Store as JSON array
            'budget_range_min' => null,
            'budget_range_max' => null,
            'additional_notes' => $data['additional_notes'] ?? '',
            'is_completed' => true,
        ]);

        // Clear session data
        session()->forget('pathfinder_data');

        return redirect()->route('pathfinder.results', $assessment)->with('recommendations', $recommendations);
    }

    public function results(PathfinderResponse $assessment)
    {
        $recommendations = session('recommendations', []);
        return view('pathfinder.results', compact('assessment', 'recommendations'));
    }

    public function downloadReport(PathfinderResponse $assessment)
    {
        $pdf = PDF::loadView('reports.pathway', compact('assessment'));
        return $pdf->download('pathfinder-report-' . $assessment->id . '.pdf');
    }

    public function reset()
    {
        session()->forget('pathfinder_data');
        return redirect()->route('pathfinder.index');
    }

    private function getBudgetMin($budgetRange)
    {
        switch ($budgetRange) {
            case 'low':
                return 0;
            case 'medium':
                return 500000;
            case 'high':
                return 1500000;
            default:
                return null;
        }
    }

    private function getBudgetMax($budgetRange)
    {
        switch ($budgetRange) {
            case 'low':
                return 500000;
            case 'medium':
                return 1500000;
            case 'high':
                return 5000000; // High budget cap
            default:
                return null;
        }
    }

    private function generateRecommendations($data)
    {
        $academicLevel = $data['academic_level'];
        $fieldsOfInterest = json_decode($data['fields_of_interest'], true);
        $careerGoals = json_decode($data['career_goals'], true);
        $selfRating = $data['self_academic_rating'];
        $peerRating = $data['peer_teacher_rating'];
        $locations = json_decode($data['preferred_locations'], true);
        $programLevel = $data['program_level'];

        $recommendations = [];

        // Advanced Level Holder Recommendations
        if ($academicLevel === 'advanced_level') {
            $recommendations['title'] = 'University Course Recommendations for Advanced Level Holder';
            $recommendations['subtitle'] = 'Based on your Advanced Level background and interests, here are our recommendations:';
            
            $recommendations['programs'] = [];
            
            if (in_array('science', $fieldsOfInterest)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Science in Computer Science',
                    'description' => 'Perfect for technology and problem-solving interests',
                    'duration' => '4 years',
                    'careers' => ['Software Developer', 'Data Analyst', 'IT Consultant']
                ];
            }
            
            if (in_array('medicine', $fieldsOfInterest)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Medicine and Surgery (MBBS)',
                    'description' => 'Excellent choice for healthcare career goals',
                    'duration' => '6 years',
                    'careers' => ['Medical Doctor', 'Surgeon', 'Medical Researcher']
                ];
            }
            
            if (in_array('business', $fieldsOfInterest)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Business Administration',
                    'description' => 'Great foundation for business and entrepreneurship',
                    'duration' => '4 years',
                    'careers' => ['Business Manager', 'Entrepreneur', 'Financial Analyst']
                ];
            }
            
            if (in_array('engineering', $fieldsOfInterest)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Engineering (Civil/Mechanical/Electrical)',
                    'description' => 'Strong technical foundation for engineering careers',
                    'duration' => '4-5 years',
                    'careers' => ['Civil Engineer', 'Mechanical Engineer', 'Project Manager']
                ];
            }

            $locationText = implode(', ', array_map('ucfirst', $locations));
            $recommendations['next_steps'] = [
                'Research universities in ' . $locationText,
                'Check admission requirements and deadlines',
                'Prepare for entrance exams if required',
                'Apply for scholarships based on your ' . $selfRating . ' self-rating and ' . $peerRating . ' peer/teacher rating'
            ];
        }

        // HND Holder Recommendations
        elseif ($academicLevel === 'hnd') {
            $recommendations['title'] = 'Degree Program Recommendations for HND Holder';
            $recommendations['subtitle'] = 'Based on your HND background, here are our top-up degree recommendations:';
            
            $recommendations['programs'] = [];
            
            if (in_array('business', $fieldsOfInterest)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Business Administration (Top-up)',
                    'description' => 'Complete your degree in 1-2 years',
                    'duration' => '1-2 years',
                    'careers' => ['Business Manager', 'Marketing Manager', 'HR Specialist']
                ];
            }
            
            if (in_array('technology', $careerGoals)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Science in Information Technology (Top-up)',
                    'description' => 'Advance your IT career with a degree',
                    'duration' => '1-2 years',
                    'careers' => ['IT Manager', 'Systems Analyst', 'Network Administrator']
                ];
            }
            
            if (in_array('engineering', $fieldsOfInterest)) {
                $recommendations['programs'][] = [
                    'name' => 'Bachelor of Engineering (Top-up)',
                    'description' => 'Complete your engineering degree',
                    'duration' => '1-2 years',
                    'careers' => ['Engineer', 'Project Manager', 'Technical Consultant']
                ];
            }

            $recommendations['next_steps'] = [
                'Contact universities for HND top-up programs',
                'Check credit transfer possibilities',
                'Apply for professional certifications',
                'Consider industry-specific training programs'
            ];
        }

        // Degree Holder Recommendations
        elseif ($academicLevel === 'degree') {
            $recommendations['title'] = 'Post-Graduate Opportunities for Degree Holder';
            $recommendations['subtitle'] = 'Based on your degree background, here are your next academic and career options:';
            
            $recommendations['programs'] = [];
            
            if ($programLevel === 'master') {
                $recommendations['programs'][] = [
                    'name' => 'Master of Business Administration (MBA)',
                    'description' => 'Advance your business and leadership skills',
                    'duration' => '1-2 years',
                    'careers' => ['Senior Manager', 'Business Consultant', 'Entrepreneur']
                ];
                
                $recommendations['programs'][] = [
                    'name' => 'Master of Science in Data Science',
                    'description' => 'High-demand field with excellent career prospects',
                    'duration' => '1-2 years',
                    'careers' => ['Data Scientist', 'Analytics Manager', 'AI Specialist']
                ];
            }
            
            if ($programLevel === 'phd') {
                $recommendations['programs'][] = [
                    'name' => 'PhD in your field of specialization',
                    'description' => 'Research and academic career path',
                    'duration' => '3-5 years',
                    'careers' => ['University Professor', 'Research Scientist', 'Industry Expert']
                ];
            }

            $recommendations['career_options'] = [
                'Professional certifications in your field',
                'Industry-specific training programs',
                'International work opportunities',
                'Entrepreneurship and business ownership',
                'Consulting and freelance work'
            ];

            $recommendations['next_steps'] = [
                'Research graduate programs in your field',
                'Network with professionals in your industry',
                'Consider international opportunities',
                'Develop specialized skills through certifications'
            ];
        }

        $recommendations['mentor_consultation'] = [
            'title' => 'Get Personalized Guidance',
            'description' => 'Our expert mentors can provide one-on-one guidance tailored to your specific situation.',
            'benefits' => [
                'Personalized career roadmap',
                'Application strategy guidance',
                'Interview preparation',
                'Industry insights and networking'
            ],
            'price' => '1000 XAF for 15 minutes',
            'impact' => 'This session could change your life for good!'
        ];

        return $recommendations;
    }
} 