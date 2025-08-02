<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MentorshipSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = User::where('role', 'mentor')->withCount('mentorshipSessions')->latest()->paginate(15);
        return view('admin.mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('admin.mentors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'expertise' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'bio' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'is_active' => 'boolean',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'mentor';
        $data['is_active'] = $request->has('is_active');
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        User::create($data);

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor created successfully.');
    }

    public function show(User $mentor)
    {
        if ($mentor->role !== 'mentor') {
            abort(404);
        }
        
        $sessions = MentorshipSession::where('mentor_id', $mentor->id)
            ->with('student')
            ->latest()
            ->paginate(10);
            
        return view('admin.mentors.show', compact('mentor', 'sessions'));
    }

    public function edit(User $mentor)
    {
        if ($mentor->role !== 'mentor') {
            abort(404);
        }
        
        return view('admin.mentors.edit', compact('mentor'));
    }

    public function update(Request $request, User $mentor)
    {
        if ($mentor->role !== 'mentor') {
            abort(404);
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $mentor->id,
            'password' => 'nullable|string|min:8|confirmed',
            'expertise' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'bio' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'is_active' => 'boolean',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('password');
        
        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        
        $data['is_active'] = $request->has('is_active');
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($mentor->avatar) {
                Storage::disk('public')->delete($mentor->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        $mentor->update($data);

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor updated successfully.');
    }

    public function destroy(User $mentor)
    {
        if ($mentor->role !== 'mentor') {
            abort(404);
        }
        
        // Delete avatar if exists
        if ($mentor->avatar) {
            Storage::disk('public')->delete($mentor->avatar);
        }
        
        $mentor->delete();

        return redirect()->route('admin.mentors.index')
            ->with('success', 'Mentor deleted successfully.');
    }
} 