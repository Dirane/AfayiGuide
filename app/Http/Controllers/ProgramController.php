<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Program::active();

        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('institution', 'like', "%{$search}%")
                  ->orWhere('field_of_study', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('field')) {
            $query->byField($request->field);
        }

        if ($request->filled('location')) {
            $query->byLocation($request->location);
        }

        if ($request->filled('level')) {
            $query->byLevel($request->level);
        }

        if ($request->filled('min_budget') && $request->filled('max_budget')) {
            $query->byBudget($request->min_budget, $request->max_budget);
        }

        $programs = $query->paginate(12);

        // Get unique values for filters
        $fields = Program::active()
            ->whereNotNull('field_of_study')
            ->distinct()
            ->pluck('field_of_study')
            ->filter()
            ->sort()
            ->values();

        $locations = Program::active()
            ->whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->filter()
            ->sort()
            ->values();

        $levels = Program::active()
            ->whereNotNull('level')
            ->distinct()
            ->pluck('level')
            ->filter()
            ->sort()
            ->values();

        return view('programs.index', compact('programs', 'fields', 'locations', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'institution' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'duration_months' => 'required|integer|min:1',
            'tuition_fee' => 'nullable|numeric|min:0',
            'currency' => 'required|string|max:3',
            'requirements' => 'nullable|array',
            'curriculum' => 'nullable|array',
            'application_deadline' => 'nullable|string',
            'start_date' => 'nullable|string',
            'website' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        Program::create($validated);

        return redirect()->route('programs.index')
            ->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'institution' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'duration_months' => 'required|integer|min:1',
            'tuition_fee' => 'nullable|numeric|min:0',
            'currency' => 'required|string|max:3',
            'requirements' => 'nullable|array',
            'curriculum' => 'nullable|array',
            'application_deadline' => 'nullable|string',
            'start_date' => 'nullable|string',
            'website' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        $program->update($validated);

        return redirect()->route('programs.index')
            ->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}
