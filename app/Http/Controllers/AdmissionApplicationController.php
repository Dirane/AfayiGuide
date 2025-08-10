<?php

namespace App\Http\Controllers;

use App\Models\AdmissionApplication;
use App\Models\School;
use Illuminate\Http\Request;

class AdmissionApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->admissionApplications()->with('school')->latest()->paginate(10);
        return view('admission-applications.index', compact('applications'));
    }

    public function create(School $school)
    {
        $programs = $school->getProgramsOfferedList();
        return view('admission-applications.create', compact('school', 'programs'));
    }

    public function store(Request $request, School $school)
    {
        $validated = $request->validate([
            'program_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
        ]);

        // Calculate application fee (15% of program fee)
        $programFee = 50000; // Default program fee, can be adjusted
        $applicationFee = $programFee * 0.15;
        $totalAmount = $programFee + $applicationFee;

        $application = AdmissionApplication::create([
            'user_id' => auth()->id(),
            'school_id' => $school->id,
            'program_name' => $validated['program_name'],
            'program_fee' => $programFee,
            'application_fee' => $applicationFee,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'additional_requirements' => $validated['whatsapp_number'],
            'notes' => 'WhatsApp: ' . $validated['whatsapp_number'],
        ]);

        return redirect()->route('admission-applications.show', $application)
            ->with('success', 'Admission application submitted successfully!');
    }

    public function show(AdmissionApplication $application)
    {
        // Check if user owns this application
        if (auth()->id() !== $application->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('admission-applications.show', compact('application'));
    }

    public function cancel(AdmissionApplication $application)
    {
        // Check if user owns this application
        if (auth()->id() !== $application->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        if ($application->status === 'pending') {
            $application->update(['status' => 'cancelled']);
            return redirect()->route('admission-applications.index')
                ->with('success', 'Application cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Cannot cancel application in current status.');
    }
}
