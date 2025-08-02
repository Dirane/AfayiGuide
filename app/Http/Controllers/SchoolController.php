<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of schools.
     */
    public function index(Request $request)
    {
        $query = School::active();

        // Apply search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        // Apply filters
        if ($request->filled('type')) {
            $query->byType($request->type);
        }

        if ($request->filled('location')) {
            $query->byLocation($request->location);
        }

        if ($request->filled('program')) {
            $query->byProgram($request->program);
        }

        // Apply sorting
        $sortBy = $request->get('sort', 'name');
        $sortDirection = $request->get('direction', 'asc');
        $query->orderBy($sortBy, $sortDirection);

        $schools = $query->paginate(12);

        // Get filter options
        $types = School::active()
            ->whereNotNull('type')
            ->distinct()
            ->pluck('type')
            ->filter()
            ->sort()
            ->values();

        $locations = School::active()
            ->whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->filter()
            ->sort()
            ->values();

        $programs = School::active()
            ->whereNotNull('programs_offered')
            ->pluck('programs_offered')
            ->flatten()
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('schools.index', compact('schools', 'types', 'locations', 'programs'));
    }

    /**
     * Display the specified school.
     */
    public function show(School $school)
    {
        // Get related programs
        $programs = $school->programs()->active()->get();
        
        return view('schools.show', compact('school', 'programs'));
    }
}
