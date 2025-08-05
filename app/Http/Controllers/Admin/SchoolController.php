<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::latest()->paginate(10);
        return view('admin.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
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
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('schools', 'public');
        }

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
        ]);

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