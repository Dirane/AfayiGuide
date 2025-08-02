<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('school')->latest()->paginate(15);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $schools = School::all();
        return view('admin.programs.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'level' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|array',
            'curriculum' => 'required|array',
            'tuition_fee' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
            'application_deadline' => 'nullable|date',
            'start_date' => 'nullable|date',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('programs', 'public');
            $data['image'] = $imagePath;
        }

        Program::create($data);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $program->load('school');
        return view('admin.programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        $schools = School::all();
        return view('admin.programs.edit', compact('program', 'schools'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'level' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|array',
            'curriculum' => 'required|array',
            'tuition_fee' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
            'application_deadline' => 'nullable|date',
            'start_date' => 'nullable|date',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $imagePath = $request->file('image')->store('programs', 'public');
            $data['image'] = $imagePath;
        }

        $program->update($data);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        // Delete image if exists
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }
        
        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }
} 