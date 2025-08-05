@extends('layouts.app')

@section('title', 'Mentor Dashboard')
@section('description', 'Your personalized mentor dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600">Here's your mentorship activity and earnings overview.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-100 text-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Sessions</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_sessions'] }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Completed</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['completed_sessions'] }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-accent-100 text-accent">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Earnings</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ number_format($stats['total_earnings']) }} XAF</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Avg Rating</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ number_format($stats['average_rating'], 1) }}/5</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('mentorship.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">📅</div>
                <h3 class="font-semibold text-gray-900 mb-2">View Sessions</h3>
                <p class="text-sm text-gray-600">Manage your mentorship sessions</p>
            </div>
        </a>

        <a href="{{ route('profile.edit') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">👤</div>
                <h3 class="font-semibold text-gray-900 mb-2">Update Profile</h3>
                <p class="text-sm text-gray-600">Update your expertise and availability</p>
            </div>
        </a>

        <a href="{{ route('schools.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">🏫</div>
                <h3 class="font-semibold text-gray-900 mb-2">Browse Schools</h3>
                <p class="text-sm text-gray-600">Stay updated on school information</p>
            </div>
        </a>

        <a href="{{ route('opportunities.index') }}" class="card hover:shadow-lg transition-shadow text-center">
            <div class="p-4">
                <div class="text-3xl mb-2">💼</div>
                <h3 class="font-semibold text-gray-900 mb-2">View Opportunities</h3>
                <p class="text-sm text-gray-600">Find opportunities to share</p>
            </div>
        </a>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Sessions -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Sessions</h3>
            @if($recentSessions->count() > 0)
                <div class="space-y-4">
                    @foreach($recentSessions as $session)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $session->student->name }}</p>
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
                <p class="text-gray-600 text-center py-8">No sessions yet. Students will be able to book sessions with you soon!</p>
            @endif
        </div>

        <!-- Upcoming Sessions -->
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Sessions</h3>
            @if($upcomingSessions->count() > 0)
                <div class="space-y-4">
                    @foreach($upcomingSessions as $session)
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $session->student->name }}</p>
                                <p class="text-sm text-gray-600">{{ $session->scheduled_at->format('M d, Y H:i') }}</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Confirmed
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No upcoming sessions scheduled.</p>
            @endif
        </div>
    </div>

    <!-- Mentor Profile Info -->
    <div class="mt-8">
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Profile</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-medium text-gray-900 mb-2">Expertise</h4>
                    <p class="text-gray-600">{{ auth()->user()->expertise ?: 'Not specified' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 mb-2">Experience</h4>
                    <p class="text-gray-600">{{ auth()->user()->experience_years ? auth()->user()->experience_years . ' years' : 'Not specified' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 mb-2">Hourly Rate</h4>
                    <p class="text-gray-600">{{ auth()->user()->hourly_rate ? number_format(auth()->user()->hourly_rate) . ' XAF/hour' : 'Not set' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 mb-2">Status</h4>
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium @if(auth()->user()->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                        {{ auth()->user()->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('profile.edit') }}" class="btn-primary">Update Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection 