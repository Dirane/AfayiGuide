@extends('layouts.admin')

@section('title', 'Reports & Analytics')
@section('description', 'View platform analytics and reports in AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Reports & Analytics</h1>
                <p class="text-xl text-gray-200">Platform insights and performance metrics</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Overall Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">👥</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalUsers ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Total Users</p>
                <p class="text-xs text-green-600 mt-1">+{{ $usersThisMonth ?? 0 }} this month</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📊</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalAssessments ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Total Assessments</p>
                <p class="text-xs text-green-600 mt-1">+{{ $assessmentsThisMonth ?? 0 }} this month</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💬</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalSessions ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Total Sessions</p>
                <p class="text-xs text-green-600 mt-1">+{{ $sessionsThisMonth ?? 0 }} this month</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📈</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ number_format($userGrowth ?? 0, 1) }}%</h3>
                <p class="text-gray-600 text-sm">User Growth</p>
                <p class="text-xs text-green-600 mt-1">vs last month</p>
            </div>
        </div>

        <!-- User Distribution -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">User Distribution</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Students</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: {{ $studentsCount > 0 ? ($studentsCount / $totalUsers) * 100 : 0 }}%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-900">{{ $studentsCount ?? 0 }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Mentors</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $mentorsCount > 0 ? ($mentorsCount / $totalUsers) * 100 : 0 }}%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-900">{{ $mentorsCount ?? 0 }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Admins</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                                <div class="bg-red-600 h-2 rounded-full" style="width: {{ $adminsCount > 0 ? ($adminsCount / $totalUsers) * 100 : 0 }}%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-900">{{ $adminsCount ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>

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
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">User Reports</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.reports.users') }}" class="block w-full btn-primary text-center">
                        View User Analytics
                    </a>
                    <p class="text-sm text-gray-600">Detailed user statistics and demographics</p>
                </div>
            </div>

            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Assessment Reports</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.reports.assessments') }}" class="block w-full btn-primary text-center">
                        View Assessment Analytics
                    </a>
                    <p class="text-sm text-gray-600">Pathfinder assessment insights and trends</p>
                </div>
            </div>

            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Export Data</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.assessments.export') }}" class="block w-full btn-outline text-center">
                        Export Assessments
                    </a>
                    <p class="text-sm text-gray-600">Download assessment data as CSV</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 