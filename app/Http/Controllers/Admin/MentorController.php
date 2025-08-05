<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = User::where('role', 'mentor')->latest()->paginate(10);
        return view('admin.mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('admin.mentors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expertise' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'mentor';

        User::create($validated);

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor created successfully.');
    }

    public function show(User $mentor)
    {
        // Ensure the user is a mentor
        if ($mentor->role !== 'mentor') {
            return redirect()->route('admin.mentors.index')
                ->with('error', 'User is not a mentor.');
        }

        $mentor->load('mentorshipSessions.student');
        return view('admin.mentors.show', compact('mentor'));
    }

    public function edit(User $mentor)
    {
        // Ensure the user is a mentor
        if ($mentor->role !== 'mentor') {
            return redirect()->route('admin.mentors.index')
                ->with('error', 'User is not a mentor.');
        }

        return view('admin.mentors.edit', compact('mentor'));
    }

    public function update(Request $request, User $mentor)
    {
        // Ensure the user is a mentor
        if ($mentor->role !== 'mentor') {
            return redirect()->route('admin.mentors.index')
                ->with('error', 'User is not a mentor.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $mentor->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expertise' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Delete old image
            if ($mentor->profile_picture) {
                Storage::disk('public')->delete($mentor->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        }

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $mentor->update($validated);

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor updated successfully.');
    }

    public function destroy(User $mentor)
    {
        // Ensure the user is a mentor
        if ($mentor->role !== 'mentor') {
            return redirect()->route('admin.mentors.index')
                ->with('error', 'User is not a mentor.');
        }

        // Delete profile picture if exists
        if ($mentor->profile_picture) {
            Storage::disk('public')->delete($mentor->profile_picture);
        }

        $mentor->delete();

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor deleted successfully.');
    }
} 