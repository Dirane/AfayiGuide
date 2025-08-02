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
        $schools = School::withCount('programs')->latest()->paginate(15);
        return view('admin.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'admission_requirements' => 'required|array',
            'application_steps' => 'required|array',
            'required_documents' => 'required|array',
            'programs_offered' => 'required|array',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'application_deadline' => 'nullable|date',
            'tuition_fee_range' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('schools', 'public');
            $data['image'] = $imagePath;
        }

        School::create($data);

        return redirect()->route('admin.schools.index')
            ->with('success', 'School created successfully.');
    }

    public function show(School $school)
    {
        $school->load('programs');
        return view('admin.schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        return view('admin.schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'admission_requirements' => 'required|array',
            'application_steps' => 'required|array',
            'required_documents' => 'required|array',
            'programs_offered' => 'required|array',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'application_deadline' => 'nullable|date',
            'tuition_fee_range' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($school->image) {
                Storage::disk('public')->delete($school->image);
            }
            $imagePath = $request->file('image')->store('schools', 'public');
            $data['image'] = $imagePath;
        }

        $school->update($data);

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