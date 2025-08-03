@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('description', 'Admin dashboard for AfayiGuide platform management.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Admin Dashboard</h1>
                <p class="text-xl text-gray-200">Platform overview and management</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Main Stats -->
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
                        <span class="text-sm text-gray-600">Completed</span>
                        <span class="text-sm font-medium text-gray-900">{{ $completedSessions }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Pending</span>
                        <span class="text-sm font-medium text-gray-900">{{ $pendingSessions }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">This Month</span>
                        <span class="text-sm font-medium text-gray-900">{{ $sessionsThisMonth }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.schools.create') }}" class="card hover:shadow-lg transition-shadow text-center">
                    <div class="text-3xl text-accent mb-2">🏫</div>
                    <h3 class="font-semibold text-gray-900">Add School</h3>
                    <p class="text-sm text-gray-600">Create new school entry</p>
                </a>
                <a href="{{ route('admin.programs.create') }}" class="card hover:shadow-lg transition-shadow text-center">
                    <div class="text-3xl text-accent mb-2">📚</div>
                    <h3 class="font-semibold text-gray-900">Add Program</h3>
                    <p class="text-sm text-gray-600">Create new program</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-3xl text-accent mb-2">💼</div>
                    <h3 class="font-semibold text-gray-900">Add Opportunity</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-3xl text-accent mb-2">👤</div>
                    <h3 class="font-semibold text-gray-900">Add User</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Users -->
            <div class="card">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h3>
                <div class="space-y-3">
                    @if($recentUsers->count() > 0)
                        @foreach($recentUsers as $user)
                            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-primary rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-medium">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                    @if($user->role === 'admin') bg-red-100 text-red-800
                                    @elseif($user->role === 'mentor') bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">No recent users</p>
                    @endif
                </div>
            </div>

            <!-- Recent Assessments -->
            <div class="card">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Assessments</h3>
                <div class="space-y-3">
                    @if($recentAssessments->count() > 0)
                        @foreach($recentAssessments as $assessment)
                            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $assessment->user->name ?? 'Anonymous' }}</p>
                                    <p class="text-xs text-gray-500">{{ Str::limit($assessment->field_of_interest, 30) }}</p>
                                </div>
                                <span class="text-xs text-gray-500">{{ $assessment->created_at->format('M j') }}</span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">No recent assessments</p>
                    @endif
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="card">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Sessions</h3>
                <div class="space-y-3">
                    @if($recentSessions->count() > 0)
                        @foreach($recentSessions as $session)
                            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $session->student->name ?? 'Student' }}</p>
                                    <p class="text-xs text-gray-500">{{ $session->mentor->name ?? 'Mentor' }}</p>
                                </div>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                    @if($session->status === 'completed') bg-green-100 text-green-800
                                    @elseif($session->status === 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($session->status) }}
                                </span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">No recent sessions</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Management Links -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Management</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.schools.index') }}" class="card hover:shadow-lg transition-shadow text-center">
                    <div class="text-2xl text-accent mb-2">🏫</div>
                    <h3 class="font-semibold text-gray-900">Manage Schools</h3>
                    <p class="text-sm text-gray-600">{{ $schoolsCount }} schools</p>
                </a>
                <a href="{{ route('admin.programs.index') }}" class="card hover:shadow-lg transition-shadow text-center">
                    <div class="text-2xl text-accent mb-2">📚</div>
                    <h3 class="font-semibold text-gray-900">Manage Programs</h3>
                    <p class="text-sm text-gray-600">{{ $programsCount }} programs</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-2xl text-accent mb-2">💼</div>
                    <h3 class="font-semibold text-gray-900">Manage Opportunities</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-2xl text-accent mb-2">👥</div>
                    <h3 class="font-semibold text-gray-900">Manage Users</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-2xl text-accent mb-2">👨‍🏫</div>
                    <h3 class="font-semibold text-gray-900">Manage Mentors</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-2xl text-accent mb-2">📊</div>
                    <h3 class="font-semibold text-gray-900">View Assessments</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-2xl text-accent mb-2">📈</div>
                    <h3 class="font-semibold text-gray-900">Reports</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
                <a href="#" class="card hover:shadow-lg transition-shadow text-center opacity-50">
                    <div class="text-2xl text-accent mb-2">⚙️</div>
                    <h3 class="font-semibold text-gray-900">Settings</h3>
                    <p class="text-sm text-gray-600">Coming soon</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 