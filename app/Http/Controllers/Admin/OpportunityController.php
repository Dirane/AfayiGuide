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
        $opportunities = Opportunity::latest()->paginate(15);
        return view('admin.opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('admin.opportunities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'amount' => 'nullable|numeric|min:0',
            'deadline' => 'required|date',
            'eligibility_criteria' => 'required|array',
            'application_steps' => 'required|array',
            'required_documents' => 'required|array',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('opportunities', 'public');
            $data['image'] = $imagePath;
        }

        Opportunity::create($data);

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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'amount' => 'nullable|numeric|min:0',
            'deadline' => 'required|date',
            'eligibility_criteria' => 'required|array',
            'application_steps' => 'required|array',
            'required_documents' => 'required|array',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($opportunity->image) {
                Storage::disk('public')->delete($opportunity->image);
            }
            $imagePath = $request->file('image')->store('opportunities', 'public');
            $data['image'] = $imagePath;
        }

        $opportunity->update($data);

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