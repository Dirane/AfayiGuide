<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::latest()->paginate(10);
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

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('opportunities', 'public');
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

        if ($request->hasFile('image')) {
            // Delete old image
            if ($opportunity->image) {
                Storage::disk('public')->delete($opportunity->image);
            }
            $validated['image'] = $request->file('image')->store('opportunities', 'public');
        }

        $opportunity->update($validated);

        return redirect()->route('admin.opportunities.index')
            ->with('success', 'Opportunity updated successfully.');
    }

    public function destroy(Opportunity $opportunity)
    {
        // Delete image if exists
        if ($opportunity->image) {
            Storage::disk('public')->delete($opportunity->image);
        }

        $opportunity->delete();

        return redirect()->route('admin.opportunities.index')
            ->with('success', 'Opportunity deleted successfully.');
    }
} 