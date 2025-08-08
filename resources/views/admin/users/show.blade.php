@extends('layouts.admin')

@section('title', 'User Details')
@section('description', 'View user information')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">User Details</h1>
            <p class="text-gray-600">View user information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn-primary">
                Edit User
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn-outline">
                Back to Users
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->email }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Role</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($user->role === 'admin') bg-red-100 text-red-800
                                    @elseif($user->role === 'mentor') bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($user->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </p>
                        </div>
                        
                        @if($user->phone)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->phone }}</p>
                        </div>
                        @endif
                        
                        @if($user->location)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Location</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->location }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bio -->
            @if($user->bio)
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Bio</h2>
                <div class="prose max-w-none">
                    <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $user->bio }}</p>
                </div>
            </div>
            @endif

            <!-- Mentor Information -->
            @if($user->role === 'mentor')
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Mentor Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @if($user->expertise)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Expertise</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->expertise }}</p>
                    </div>
                    @endif
                    
                    @if($user->experience_years)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Years of Experience</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->experience_years }} years</p>
                    </div>
                    @endif
                    
                    @if($user->hourly_rate)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Hourly Rate</label>
                        <p class="mt-1 text-sm text-gray-900">{{ number_format($user->hourly_rate) }} XAF</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- User Statistics -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">User Statistics</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Member Since</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Login</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->last_login_at ? $user->last_login_at->format('M d, Y H:i') : 'Never' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Profile Picture -->
            @if($user->profile_picture)
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Profile Picture</h2>
                <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile picture" class="w-full h-48 object-cover rounded-lg">
            </div>
            @endif

            <!-- Actions -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Actions</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.users.edit', $user) }}" class="w-full btn-primary text-center">
                        Edit User
                    </a>
                    
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full btn-outline text-red-600 border-red-600 hover:bg-red-50" 
                                onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete User
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Stats</h2>
                <div class="space-y-3">
                    @if($user->role === 'student')
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Pathfinder Assessments</span>
                        <span class="text-sm font-medium">{{ $user->pathfinderResponses()->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Mentorship Bookings</span>
                        <span class="text-sm font-medium">{{ $user->mentorshipBookings()->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Admission Applications</span>
                        <span class="text-sm font-medium">{{ $user->admissionApplications()->count() }}</span>
                    </div>
                    @endif
                    
                    @if($user->role === 'mentor')
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Mentorship Sessions</span>
                        <span class="text-sm font-medium">{{ $user->mentorshipSessions()->count() }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 