<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $query = School::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        // Sort
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        
        if (in_array($sort, ['name', 'type', 'location', 'created_at'])) {
            $query->orderBy($sort, $direction);
        }

        $schools = $query->paginate(12);

        // Get filter options
        $types = School::whereNotNull('type')->distinct()->pluck('type')->sort()->values();
        $locations = School::whereNotNull('location')->distinct()->pluck('location')->sort()->values();

        return view('schools.index', compact('schools', 'types', 'locations'));
    }

    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }
} 