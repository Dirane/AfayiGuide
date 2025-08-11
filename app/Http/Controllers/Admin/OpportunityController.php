<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $query = Opportunity::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('organization', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
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

        $opportunities = $query->latest()->paginate(10)->withQueryString();
        
        return view('admin.opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('admin.opportunities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:scholarship,internship,job,training,competition',
            'organization' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'deadline' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'application_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        // Convert requirements and benefits from string to array
        if (!empty($validated['requirements'])) {
            $validated['requirements'] = array_filter(array_map('trim', explode("\n", $validated['requirements'])));
        }
        if (!empty($validated['benefits'])) {
            $validated['benefits'] = array_filter(array_map('trim', explode("\n", $validated['benefits'])));
        }

        if ($request->hasFile('image')) {
            $validated['images'] = [$request->file('image')->store('opportunities', 'public')];
        }

        $validated['posted_by'] = auth()->id();

        Opportunity::create($validated);

        return redirect()->route('admin.opportunities.index')
            ->with('success', 'Opportunity created successfully.');
    }

    public function show(Opportunity $opportunity)
    {
        return view('admin.opportunities.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        return view('admin.opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:scholarship,internship,job,training,competition',
            'organization' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'deadline' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'application_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        // Convert requirements and benefits from string to array
        if (!empty($validated['requirements'])) {
            $validated['requirements'] = array_filter(array_map('trim', explode("\n", $validated['requirements'])));
        }
        if (!empty($validated['benefits'])) {
            $validated['benefits'] = array_filter(array_map('trim', explode("\n", $validated['benefits'])));
        }

        if ($request->hasFile('image')) {
            // Delete old images
            if ($opportunity->images && is_array($opportunity->images)) {
                foreach ($opportunity->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $validated['images'] = [$request->file('image')->store('opportunities', 'public')];
        }

        $opportunity->update($validated);

        return redirect()->route('admin.opportunities.index')
            ->with('success', 'Opportunity updated successfully.');
    }

    public function destroy(Opportunity $opportunity)
    {
        // Delete images if exist
        if ($opportunity->images && is_array($opportunity->images)) {
            foreach ($opportunity->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $opportunity->delete();

        return redirect()->route('admin.opportunities.index')
            ->with('success', 'Opportunity deleted successfully.');
    }
} 