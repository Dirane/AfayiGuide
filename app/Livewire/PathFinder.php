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
        'academicBackground' => 'nullable|string',
        'fieldOfInterest' => 'nullable|string',
        'careerGoals' => 'nullable|string',
        'aspirations' => 'nullable|string',
        'skills' => 'nullable|array',
        'interests' => 'nullable|array',
        'preferredLocation' => 'nullable|string',
        'budgetRangeMin' => 'nullable|numeric|min:0',
        'budgetRangeMax' => 'nullable|numeric|min:0',
        'additionalNotes' => 'nullable|string',
    ];

    public function mount()
    {
        // Initialize component
        session()->flash('message', 'PathFinder component loaded successfully!');
    }

    public function nextStep()
    {
        // Debug: Log that the method was called
        \Log::info("PathFinder nextStep called - Current step: {$this->currentStep}, Total steps: {$this->totalSteps}");
        session()->flash('message', "Next button clicked! Moving from step {$this->currentStep} to " . ($this->currentStep + 1));
        
        // Simple step progression without complex validation
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            \Log::info("PathFinder step incremented to: {$this->currentStep}");
        } else {
            \Log::info("PathFinder: Cannot increment step - already at max");
        }
    }

    public function previousStep()
    {
        // Debug: Log that the method was called
        session()->flash('message', "Previous button clicked! Moving from step {$this->currentStep} to " . ($this->currentStep - 1));
        
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
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
        // Only validate required fields when submitting
        $this->validate([
            'academicBackground' => 'required|string',
            'fieldOfInterest' => 'required|string',
            'careerGoals' => 'required|string',
            'aspirations' => 'required|string',
        ]);
        
        if (!auth()->check()) {
            // Redirect to login if user is not authenticated
            return redirect()->route('login');
        }
        
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
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // Generate PDF report
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.pathway', [
            'response' => $this->pathfinderResponse
        ]);
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pathway-report-' . auth()->user()->name . '.pdf');
    }

    public function simpleTest()
    {
        // Simple test that just changes a property
        $this->currentStep = 2;
        session()->flash('message', 'Simple test successful! Moved to step 2');
    }

    public function forceNext()
    {
        // Force next step without any validation
        $this->currentStep++;
        session()->flash('message', "Force next successful! Now at step {$this->currentStep}");
    }

    public function testStep()
    {
        // Debug: Log that the method was called
        session()->flash('message', "Test button clicked! Current step: {$this->currentStep}");
        
        // Simple test method to verify the component is working
        $this->currentStep = 2; // Force move to step 2 for testing
    }

    public function debugStep()
    {
        // Debug: Log that the method was called
        session()->flash('message', "Debug button clicked! Current step: {$this->currentStep}, Total steps: {$this->totalSteps}");
    }

    private function getStepValidationRules()
    {
        // Return empty rules for all steps to allow progression
        return [];
    }

    public function resetForm()
    {
        $this->reset([
            'currentStep',
            'academicBackground',
            'fieldOfInterest',
            'careerGoals',
            'aspirations',
            'skills',
            'interests',
            'preferredLocation',
            'budgetRangeMin',
            'budgetRangeMax',
            'additionalNotes',
            'showResults',
            'pathfinderResponse'
        ]);
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.path-finder');
    }
}
