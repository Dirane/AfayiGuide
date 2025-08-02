@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('description', 'Administrative dashboard for AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Admin Dashboard</h1>
                <p class="text-xl text-gray-200">Manage AfayiGuide platform</p>
            </div>
        </div>
    </div>

    <!-- Admin Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">👥</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $usersCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Total Users</p>
                <p class="text-xs text-green-600 mt-1">+{{ $usersThisMonth ?? 0 }} this month</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">🎓</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $programsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Programs</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💼</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $opportunitiesCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Opportunities</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">🏫</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $schoolsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Schools</p>
            </div>
        </div>

        <!-- Additional Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📊</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $assessmentsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Assessments</p>
                <p class="text-xs text-green-600 mt-1">+{{ $assessmentsThisMonth ?? 0 }} this month</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">👨‍🏫</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $mentorsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Mentors</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💬</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $sessionsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Sessions</p>
                <p class="text-xs text-green-600 mt-1">+{{ $sessionsThisMonth ?? 0 }} this month</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Actions -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.schools.index') }}" class="block w-full btn-primary text-center">
                        Manage Schools
                    </a>
                    <a href="{{ route('admin.programs.index') }}" class="block w-full btn-primary text-center">
                        Manage Programs
                    </a>
                    <a href="{{ route('admin.opportunities.index') }}" class="block w-full btn-primary text-center">
                        Manage Opportunities
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="block w-full btn-outline text-center">
                        Manage Users
                    </a>
                    <a href="{{ route('admin.mentors.index') }}" class="block w-full btn-outline text-center">
                        Manage Mentors
                    </a>
                    <a href="{{ route('admin.assessments.index') }}" class="block w-full btn-outline text-center">
                        View Assessments
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Activity</h3>
                <div class="space-y-3">
                    @if(isset($recentUsers) && $recentUsers->count() > 0)
                        <div class="text-sm">
                            <h4 class="font-medium text-gray-900 mb-2">New Users</h4>
                            @foreach($recentUsers as $user)
                                <div class="flex items-center justify-between py-1">
                                    <span class="text-gray-600">{{ $user->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(isset($recentAssessments) && $recentAssessments->count() > 0)
                        <div class="text-sm mt-4">
                            <h4 class="font-medium text-gray-900 mb-2">Recent Assessments</h4>
                            @foreach($recentAssessments as $assessment)
                                <div class="flex items-center justify-between py-1">
                                    <span class="text-gray-600">{{ $assessment->user->name ?? 'Anonymous' }}</span>
                                    <span class="text-xs text-gray-500">{{ $assessment->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(!isset($recentUsers) || $recentUsers->count() == 0)
                        <div class="text-gray-600 text-sm">
                            <p>No recent activity to display.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- System Status -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">System Status</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Platform Status</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Online
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Database</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Connected
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Storage</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Normal
                        </span>
                    </div>
                    <div class="pt-3 border-t">
                        <a href="{{ route('admin.reports.index') }}" class="block w-full btn-outline text-center text-sm">
                            View Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 