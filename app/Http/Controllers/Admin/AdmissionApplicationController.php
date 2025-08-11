<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use Illuminate\Http\Request;

class AdmissionApplicationController extends Controller
{
    public function index()
    {
        $applications = AdmissionApplication::with(['user', 'school'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $stats = [
            'total' => AdmissionApplication::count(),
            'pending' => AdmissionApplication::where('status', 'pending')->count(),
            'processing' => AdmissionApplication::where('status', 'processing')->count(),
            'submitted' => AdmissionApplication::where('status', 'submitted')->count(),
            'accepted' => AdmissionApplication::where('status', 'accepted')->count(),
            'rejected' => AdmissionApplication::where('status', 'rejected')->count(),
        ];

        return view('admin.admission-applications.index', compact('applications', 'stats'));
    }

    public function show(AdmissionApplication $application)
    {
        $application->load(['user', 'school']);
        return view('admin.admission-applications.show', compact('application'));
    }

    public function updateStatus(Request $request, AdmissionApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,submitted,accepted,rejected,cancelled',
            'notes' => 'nullable|string|max:1000',
            'deadline' => 'nullable|date',
            'submitted_at' => 'nullable|date',
            'response_date' => 'nullable|date',
            'response_notes' => 'nullable|string|max:1000',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    public function destroy(AdmissionApplication $application)
    {
        $application->delete();
        return redirect()->route('admin.admission-applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}
