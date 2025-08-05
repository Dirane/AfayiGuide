@extends('layouts.admin')

@section('title', 'Reports & Analytics')
@section('description', 'Admin panel for viewing reports and analytics.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Reports & Analytics</h1>
                <p class="text-xl text-gray-200">Platform insights and data analysis</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">👥</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalUsers }}</h3>
                <p class="text-gray-600 text-sm">Total Users</p>
                <div class="mt-2 text-xs">
                    <span class="{{ $userGrowth >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $userGrowth >= 0 ? '+' : '' }}{{ number_format($userGrowth, 1) }}% this month
                    </span>
                </div>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📊</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $assessmentsCount }}</h3>
                <p class="text-gray-600 text-sm">Total Assessments</p>
                <div class="mt-2 text-xs">
                    <span class="{{ $assessmentGrowth >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $assessmentGrowth >= 0 ? '+' : '' }}{{ number_format($assessmentGrowth, 1) }}% this month
                    </span>
                </div>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💬</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $sessionsCount }}</h3>
                <p class="text-gray-600 text-sm">Total Sessions</p>
                <div class="mt-2 text-xs">
                    <span class="{{ $sessionGrowth >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $sessionGrowth >= 0 ? '+' : '' }}{{ number_format($sessionGrowth, 1) }}% this month
                    </span>
                </div>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💰</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ number_format($totalEarnings) }}</h3>
                <p class="text-gray-600 text-sm">Total Earnings (XAF)</p>
            </div>
        </div>

        <!-- User Distribution -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
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
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Active Mentors</span>
                        <span class="text-sm font-medium text-gray-900">{{ $activeMentors }}</span>
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
                        <span class="text-sm text-gray-600">Programs</span>
                        <span class="text-sm font-medium text-gray-900">{{ $programsCount }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Opportunities</span>
                        <span class="text-sm font-medium text-gray-900">{{ $opportunitiesCount }}</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Session Status</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Pending</span>
                        <span class="text-sm font-medium text-gray-900">{{ $pendingSessions }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Completed</span>
                        <span class="text-sm font-medium text-gray-900">{{ $completedSessions }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Earnings</span>
                        <span class="text-sm font-medium text-gray-900">{{ number_format($totalEarnings) }} XAF</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="card">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">User Reports</h3>
                <p class="text-sm text-gray-600 mb-4">Detailed user analytics and statistics</p>
                <a href="{{ route('admin.reports.users') }}" class="btn-primary">
                    View User Reports
                </a>
            </div>

            <div class="card">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Assessment Reports</h3>
                <p class="text-sm text-gray-600 mb-4">PathFinder assessment analytics</p>
                <a href="{{ route('admin.reports.assessments') }}" class="btn-primary">
                    View Assessment Reports
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Activity</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Users -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h3>
                    <div class="space-y-3">
                        @forelse($recentUsers as $user)
                            <div class="flex items-center">
                                <div class="h-8 w-8 bg-primary rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-medium">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No recent users</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Assessments -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Assessments</h3>
                    <div class="space-y-3">
                        @forelse($recentAssessments as $assessment)
                            <div class="flex items-center">
                                <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 text-xs font-medium">A</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $assessment->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $assessment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No recent assessments</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Sessions -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Sessions</h3>
                    <div class="space-y-3">
                        @forelse($recentSessions as $session)
                            <div class="flex items-center">
                                <div class="h-8 w-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 text-xs font-medium">S</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $session->student->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $session->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No recent sessions</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 