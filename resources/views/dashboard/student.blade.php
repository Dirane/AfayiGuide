@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('description', 'Your personalized student dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600">Here's what's happening with your educational journey.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-100 text-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Schools Explored</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_schools'] }}</p>
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
                    <p class="text-sm font-medium text-gray-600">PathFinder Assessments</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['pathfinder_responses'] }}</p>
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
                    <p class="text-sm font-medium text-gray-600">Mentorship Sessions</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['mentorship_sessions'] }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Opportunities</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_opportunities'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('schools.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">🏫</div>
                <h3 class="font-semibold text-gray-900 mb-2">Browse Schools</h3>
                <p class="text-sm text-gray-600">Explore schools and their requirements</p>
            </div>
        </a>

        <a href="{{ route('pathfinder.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">🎯</div>
                <h3 class="font-semibold text-gray-900 mb-2">Take PathFinder</h3>
                <p class="text-sm text-gray-600">Get personalized recommendations</p>
            </div>
        </a>

        <a href="{{ route('mentorship.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">👥</div>
                <h3 class="font-semibold text-gray-900 mb-2">Book Mentorship</h3>
                <p class="text-sm text-gray-600">Get 1-on-1 guidance</p>
            </div>
        </a>

        <a href="{{ route('opportunities.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">💼</div>
                <h3 class="font-semibold text-gray-900 mb-2">View Opportunities</h3>
                <p class="text-sm text-gray-600">Find scholarships and opportunities</p>
            </div>
        </a>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent PathFinder Assessments -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent PathFinder Assessments</h3>
            @if($recentPathfinderResponses->count() > 0)
                <div class="space-y-4">
                    @foreach($recentPathfinderResponses as $assessment)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ Str::limit($assessment->field_of_interest, 50) }}</p>
                                <p class="text-sm text-gray-600">{{ $assessment->created_at->format('M d, Y') }}</p>
                            </div>
                            <a href="{{ route('pathfinder.results', $assessment) }}" class="btn-outline text-sm">View Results</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No assessments yet. <a href="{{ route('pathfinder.index') }}" class="text-primary hover:underline">Take your first assessment</a></p>
            @endif
        </div>

        <!-- Recent Mentorship Sessions -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Mentorship Sessions</h3>
            @if($recentMentorshipSessions->count() > 0)
                <div class="space-y-4">
                    @foreach($recentMentorshipSessions as $session)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $session->mentor->name }}</p>
                                <p class="text-sm text-gray-600">{{ $session->created_at->format('M d, Y') }}</p>
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
                <p class="text-gray-600 text-center py-8">No sessions yet. <a href="{{ route('mentorship.index') }}" class="text-primary hover:underline">Book your first session</a></p>
            @endif
        </div>
    </div>
</div>
@endsection 