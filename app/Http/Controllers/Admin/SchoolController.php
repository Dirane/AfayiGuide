<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $query = School::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Type filter
        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // Status filter
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('is_active', $request->status === 'active');
        }

        $schools = $query->latest()->paginate(15)->withQueryString();
        
        return view('admin.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
    {
        // Debug: Log the incoming request data
        \Log::info('School creation request data:', $request->all());
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:university,college,institute,polytechnic,vocational,secondary,primary',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'address' => 'nullable|string',
            'admission_requirements' => 'nullable|array',
            'application_steps' => 'nullable|array',
            'required_documents' => 'nullable|array',
            'programs_offered' => 'nullable|array',
            'is_active' => 'boolean',
            'application_fee' => 'nullable|numeric|min:0',
            'tuition_fee_min' => 'nullable|numeric|min:0',
            'tuition_fee_max' => 'nullable|numeric|min:0|gte:tuition_fee_min',
            'currency' => 'nullable|string|max:3',
        ]);

        // Debug: Log the validated data
        \Log::info('School creation validated data:', $validated);

        // Set default currency if not provided
        if (!isset($validated['currency'])) {
            $validated['currency'] = 'XAF';
        }

        // Handle boolean fields
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('schools', 'public');
        }

        // Debug: Log the final data being sent to create
        \Log::info('School creation final data:', $validated);

        School::create($validated);

        return redirect()->route('admin.schools.index')
            ->with('success', 'School created successfully.');
    }

    public function show(School $school)
    {
        return view('admin.schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        return view('admin.schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:university,college,institute,polytechnic,vocational,secondary,primary',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'address' => 'nullable|string',
            'admission_requirements' => 'nullable|array',
            'application_steps' => 'nullable|array',
            'required_documents' => 'nullable|array',
            'programs_offered' => 'nullable|array',
            'is_active' => 'boolean',
            'application_fee' => 'nullable|numeric|min:0',
            'tuition_fee_min' => 'nullable|numeric|min:0',
            'tuition_fee_max' => 'nullable|numeric|min:0|gte:tuition_fee_min',
            'currency' => 'nullable|string|max:3',
        ]);

        // Set default currency if not provided
        if (!isset($validated['currency'])) {
            $validated['currency'] = 'XAF';
        }

        // Handle boolean fields
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($school->image) {
                Storage::disk('public')->delete($school->image);
            }
            $validated['image'] = $request->file('image')->store('schools', 'public');
        }

        $school->update($validated);

        return redirect()->route('admin.schools.index')
            ->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        // Delete image if exists
        if ($school->image) {
            Storage::disk('public')->delete($school->image);
        }

        $school->delete();

        return redirect()->route('admin.schools.index')
            ->with('success', 'School deleted successfully.');
    }
} 