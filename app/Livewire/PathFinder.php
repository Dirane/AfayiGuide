<?php

namespace App\Livewire;

use App\Models\PathfinderResponse;
use Livewire\Component;

class PathFinder extends Component
{
    public $currentStep = 1;
    public $totalSteps = 5;
    
    // Step 1: Academic Background
    public $academicBackground = '';
    public $fieldOfInterest = '';
    
    // Step 2: Career Goals
    public $careerGoals = '';
    public $aspirations = '';
    
    // Step 3: Skills & Interests
    public $skills = [];
    public $interests = [];
    public $newSkill = '';
    public $newInterest = '';
    
    // Step 4: Preferences
    public $preferredLocation = '';
    public $budgetRangeMin = '';
    public $budgetRangeMax = '';
    public $currency = 'XAF';
    
    // Step 5: Additional Information
    public $additionalNotes = '';
    
    // Results
    public $showResults = false;
    public $pathfinderResponse = null;
    
    protected $rules = [
        'academicBackground' => 'required|string',
        'fieldOfInterest' => 'required|string',
        'careerGoals' => 'required|string|min:10',
        'aspirations' => 'required|string|min:10',
        'skills' => 'array|min:1',
        'interests' => 'array|min:1',
        'preferredLocation' => 'nullable|string',
        'budgetRangeMin' => 'nullable|numeric|min:0',
        'budgetRangeMax' => 'nullable|numeric|min:0',
        'additionalNotes' => 'nullable|string',
    ];

    public function nextStep()
    {
        $this->validate($this->getStepValidationRules());
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function addSkill()
    {
        if (!empty($this->newSkill) && !in_array($this->newSkill, $this->skills)) {
            $this->skills[] = $this->newSkill;
            $this->newSkill = '';
        }
    }

    public function removeSkill($index)
    {
        unset($this->skills[$index]);
        $this->skills = array_values($this->skills);
    }

    public function addInterest()
    {
        if (!empty($this->newInterest) && !in_array($this->newInterest, $this->interests)) {
            $this->interests[] = $this->newInterest;
            $this->newInterest = '';
        }
    }

    public function removeInterest($index)
    {
        unset($this->interests[$index]);
        $this->interests = array_values($this->interests);
    }

    public function submitForm()
    {
        $this->validate($this->getStepValidationRules());
        
        // Create PathfinderResponse
        $this->pathfinderResponse = PathfinderResponse::create([
            'user_id' => auth()->id(),
            'academic_background' => $this->academicBackground,
            'field_of_interest' => $this->fieldOfInterest,
            'career_goals' => $this->careerGoals,
            'aspirations' => $this->aspirations,
            'skills' => $this->skills,
            'interests' => $this->interests,
            'preferred_location' => $this->preferredLocation,
            'budget_range_min' => $this->budgetRangeMin,
            'budget_range_max' => $this->budgetRangeMax,
            'currency' => $this->currency,
            'additional_notes' => $this->additionalNotes,
            'is_completed' => true,
        ]);

        // Generate recommendations and report
        $this->pathfinderResponse->generateRecommendations();
        $this->pathfinderResponse->generatePathwayReport();

        $this->showResults = true;
    }

    public function downloadReport()
    {
        // Generate PDF report
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.pathway', [
            'response' => $this->pathfinderResponse
        ]);
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pathway-report-' . auth()->user()->name . '.pdf');
    }

    private function getStepValidationRules()
    {
        $rules = [];
        
        switch ($this->currentStep) {
            case 1:
                $rules = [
                    'academicBackground' => 'required|string',
                    'fieldOfInterest' => 'required|string',
                ];
                break;
            case 2:
                $rules = [
                    'careerGoals' => 'required|string|min:10',
                    'aspirations' => 'required|string|min:10',
                ];
                break;
            case 3:
                $rules = [
                    'skills' => 'array|min:1',
                    'interests' => 'array|min:1',
                ];
                break;
            case 4:
                $rules = [
                    'preferredLocation' => 'nullable|string',
                    'budgetRangeMin' => 'nullable|numeric|min:0',
                    'budgetRangeMax' => 'nullable|numeric|min:0',
                ];
                break;
            case 5:
                $rules = [
                    'additionalNotes' => 'nullable|string',
                ];
                break;
        }
        
        return $rules;
    }

    public function render()
    {
        return view('livewire.path-finder');
    }
}
