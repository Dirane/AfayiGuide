<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with('school')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::active()->orderBy('name')->get();
        return view('admin.programs.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'duration_months' => 'required|integer|min:1',
            'tuition_fee' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:3',
            'requirements' => 'nullable|array',
            'curriculum' => 'nullable|array',
            'application_deadline' => 'nullable|date',
            'start_date' => 'nullable|date',
            'website' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'school_id' => 'required|exists:schools,id',
        ]);

        // Handle image uploads
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('programs', 'public');
                $images[] = $path;
            }
        }
        $validated['images'] = $images;

        // Set default values for boolean fields
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        // Auto-populate institution and location from school data
        $school = School::find($validated['school_id']);
        if ($school) {
            $validated['institution'] = $school->name;
            $validated['location'] = $school->city . ', ' . $school->region;
        }

        Program::create($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $program->load('school');
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $schools = School::active()->orderBy('name')->get();
        return view('admin.programs.edit', compact('program', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'duration_months' => 'required|integer|min:1',
            'tuition_fee' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:3',
            'requirements' => 'nullable|array',
            'curriculum' => 'nullable|array',
            'application_deadline' => 'nullable|date',
            'start_date' => 'nullable|date',
            'website' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'school_id' => 'required|exists:schools,id',
        ]);

        // Handle image uploads
        $images = $program->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('programs', 'public');
                $images[] = $path;
            }
        }
        $validated['images'] = $images;

        // Set default values for boolean fields
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        // Auto-populate institution and location from school data
        $school = School::find($validated['school_id']);
        if ($school) {
            $validated['institution'] = $school->name;
            $validated['location'] = $school->city . ', ' . $school->region;
        }

        $program->update($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Delete associated images
        if ($program->images) {
            foreach ($program->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}
