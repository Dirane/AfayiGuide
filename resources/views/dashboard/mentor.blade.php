@extends('layouts.app')

@section('title', 'Mentor Dashboard')
@section('description', 'Your mentor dashboard on AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Welcome back, {{ $user->name }}!</h1>
                <p class="text-xl text-gray-200">Your mentor dashboard</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💬</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalSessions }}</h3>
                <p class="text-gray-600 text-sm">Total Sessions</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">✅</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $completedSessions }}</h3>
                <p class="text-gray-600 text-sm">Completed Sessions</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">⏳</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $pendingSessions }}</h3>
                <p class="text-gray-600 text-sm">Pending Sessions</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💰</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ number_format($totalEarnings) }}</h3>
                <p class="text-gray-600 text-sm">Total Earnings (XAF)</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Actions -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('schools.index') }}" class="block w-full btn-outline text-center">
                        Browse Schools
                    </a>
                    <a href="{{ route('programs.index') }}" class="block w-full btn-outline text-center">
                        Browse Programs
                    </a>
                    <a href="{{ route('opportunities.index') }}" class="block w-full btn-outline text-center">
                        View Opportunities
                    </a>
                    <a href="{{ route('pathfinder.index') }}" class="block w-full btn-outline text-center">
                        Take PathFinder Assessment
                    </a>
                    <a href="{{ route('profile.edit') }}" class="block w-full btn-primary text-center">
                        Update Profile
                    </a>
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Sessions</h3>
                <div class="space-y-3">
                    @if($mentorshipSessions->count() > 0)
                        @foreach($mentorshipSessions->take(5) as $session)
                            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $session->student->name ?? 'Student' }}</p>
                                    <p class="text-xs text-gray-500">{{ $session->scheduled_at ? $session->scheduled_at->format('M j, Y g:i A') : 'Scheduled' }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                        @if($session->status === 'completed') bg-green-100 text-green-800
                                        @elseif($session->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($session->status === 'confirmed') bg-blue-100 text-blue-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($session->status) }}
                                    </span>
                                    @if($session->status === 'completed')
                                        <p class="text-xs text-gray-500 mt-1">{{ number_format($session->price) }} XAF</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">No sessions yet. Students will be able to book sessions with you once your profile is active.</p>
                    @endif
                </div>
            </div>

            <!-- Platform Stats -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Platform Overview</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Students</span>
                        <span class="text-sm font-medium text-gray-900">{{ $studentsCount }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Schools Available</span>
                        <span class="text-sm font-medium text-gray-900">{{ $schoolsCount }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Programs Available</span>
                        <span class="text-sm font-medium text-gray-900">{{ $programsCount }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Opportunities</span>
                        <span class="text-sm font-medium text-gray-900">{{ $opportunitiesCount }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Assessments -->
        @if($recentAssessments->count() > 0)
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Student Assessments</h2>
                <div class="card">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Student
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Academic Background
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Field of Interest
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentAssessments as $assessment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 bg-primary rounded-full flex items-center justify-center">
                                                    <span class="text-white text-sm font-medium">{{ substr($assessment->user->name ?? 'S', 0, 1) }}</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $assessment->user->name ?? 'Anonymous' }}</div>
                                                    <div class="text-sm text-gray-500">{{ $assessment->user->email ?? 'N/A' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ Str::limit($assessment->academic_background, 30) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ Str::limit($assessment->field_of_interest, 30) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $assessment->created_at->format('M j, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('pathfinder.download', $assessment->id) }}" class="text-primary hover:text-primary-800">
                                                View Report
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <!-- Mentor Profile Info -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Your Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Profile Information</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Name</span>
                            <span class="text-sm font-medium text-gray-900">{{ $user->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Email</span>
                            <span class="text-sm font-medium text-gray-900">{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Expertise</span>
                            <span class="text-sm font-medium text-gray-900">{{ $user->expertise ?? 'Not specified' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Location</span>
                            <span class="text-sm font-medium text-gray-900">{{ $user->location ?? 'Not specified' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Experience</span>
                            <span class="text-sm font-medium text-gray-900">{{ $user->experience_years ?? 0 }} years</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Hourly Rate</span>
                            <span class="text-sm font-medium text-gray-900">{{ number_format($user->hourly_rate ?? 0) }} XAF</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Rating</span>
                            <span class="text-sm font-medium text-gray-900">{{ $user->rating ?? 'No ratings yet' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Status</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                @if($user->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn-primary inline-block">
                            Update Profile
                        </a>
                    </div>
                </div>

                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Bio</h3>
                    <div class="text-sm text-gray-700">
                        @if($user->bio)
                            {{ $user->bio }}
                        @else
                            <p class="text-gray-500 italic">No bio provided yet. Update your profile to add a bio.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 