@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('description', 'Admin dashboard for AfayiGuide platform management')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
        <p class="text-gray-600">Welcome back! Here's an overview of your platform.</p>
    </div>

    <!-- Main Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-100 text-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $totalUsers }}</p>
                    <p class="text-xs text-green-600">+{{ $usersGrowth }} this month</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-accent-100 text-accent">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Assessments</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $assessmentsCount }}</p>
                    <p class="text-xs text-green-600">+{{ $assessmentsGrowth }} this month</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Sessions</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $sessionsCount }}</p>
                    <p class="text-xs text-green-600">+{{ $sessionsGrowth }} this month</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Earnings</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ number_format($totalEarnings) }} XAF</p>
                    <p class="text-xs text-green-600">From mentors</p>
                </div>
            </div>
        </div>
    </div>

    <!-- User Distribution -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">User Distribution</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Students</span>
                    <span class="text-sm font-medium text-gray-900">{{ $studentsCount }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Mentors</span>
                    <span class="text-sm font-medium text-gray-900">{{ $mentorsCount }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Admins</span>
                    <span class="text-sm font-medium text-gray-900">{{ $adminsCount }}</span>
                </div>
            </div>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Content Overview</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Schools</span>
                    <span class="text-sm font-medium text-gray-900">{{ $schoolsCount }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Opportunities</span>
                    <span class="text-sm font-medium text-gray-900">{{ $opportunitiesCount }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Active Mentors</span>
                    <span class="text-sm font-medium text-gray-900">{{ $activeMentors }}</span>
                </div>
            </div>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Session Status</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Pending</span>
                    <span class="text-sm font-medium text-gray-900">{{ $sessionStatuses['pending'] }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Confirmed</span>
                    <span class="text-sm font-medium text-gray-900">{{ $sessionStatuses['confirmed'] }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Completed</span>
                    <span class="text-sm font-medium text-gray-900">{{ $sessionStatuses['completed'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('admin.schools.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">🏫</div>
                <h3 class="font-semibold text-gray-900 mb-2">Manage Schools</h3>
                <p class="text-sm text-gray-600">Add and edit school information</p>
            </div>
        </a>

        <a href="{{ route('admin.users.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">👥</div>
                <h3 class="font-semibold text-gray-900 mb-2">Manage Users</h3>
                <p class="text-sm text-gray-600">View and manage user accounts</p>
            </div>
        </a>

        <a href="{{ route('admin.mentors.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">👨‍🏫</div>
                <h3 class="font-semibold text-gray-900 mb-2">Manage Mentors</h3>
                <p class="text-sm text-gray-600">Manage mentor profiles</p>
            </div>
        </a>

        <a href="{{ route('admin.assessments.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">📊</div>
                <h3 class="font-semibold text-gray-900 mb-2">View Assessments</h3>
                <p class="text-sm text-gray-600">Review PathFinder responses</p>
            </div>
        </a>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Users -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h3>
            @if($recentUsers->count() > 0)
                <div class="space-y-4">
                    @foreach($recentUsers as $user)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-medium">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-600">{{ ucfirst($user->role) }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500">{{ $user->created_at->format('M d') }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No recent users</p>
            @endif
        </div>

        <!-- Recent Assessments -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Assessments</h3>
            @if($recentAssessments->count() > 0)
                <div class="space-y-4">
                    @foreach($recentAssessments as $assessment)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $assessment->user->name }}</p>
                                <p class="text-xs text-gray-600">{{ Str::limit($assessment->field_of_interest, 30) }}</p>
                            </div>
                            <span class="text-xs text-gray-500">{{ $assessment->created_at->format('M d') }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No recent assessments</p>
            @endif
        </div>

        <!-- Recent Sessions -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Sessions</h3>
            @if($recentSessions->count() > 0)
                <div class="space-y-4">
                    @foreach($recentSessions as $session)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $session->student->name }}</p>
                                <p class="text-xs text-gray-600">with {{ $session->mentor->name }}</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                @if($session->status === 'completed') bg-green-100 text-green-800
                                @elseif($session->status === 'confirmed') bg-blue-100 text-blue-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($session->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No recent sessions</p>
            @endif
        </div>
    </div>
</div>
@endsection 