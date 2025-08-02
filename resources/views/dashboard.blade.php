@extends('layouts.app')

@section('title', 'Dashboard')
@section('description', 'Your personal dashboard on AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-xl text-gray-200">Your personal dashboard on AfayiGuide</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">🏫</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $schoolsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Schools</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">🎓</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $programsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Programs Available</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💼</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $opportunitiesCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Opportunities</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">👥</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $mentorsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">Active Mentors</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📊</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $assessmentsCount ?? 0 }}</h3>
                <p class="text-gray-600 text-sm">PathFinder Assessments</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Actions -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('pathfinder.index') }}" class="block w-full btn-primary text-center">
                        Take PathFinder Assessment
                    </a>
                    <a href="{{ route('schools.index') }}" class="block w-full btn-outline text-center">
                        Browse Schools
                    </a>
                    <a href="{{ route('programs.index') }}" class="block w-full btn-outline text-center">
                        Browse Programs
                    </a>
                    <a href="{{ route('opportunities.index') }}" class="block w-full btn-outline text-center">
                        View Opportunities
                    </a>
                    <a href="{{ route('mentorship.index') }}" class="block w-full btn-outline text-center">
                        Book Mentorship
                    </a>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Profile Information</h3>
                <div class="space-y-2 text-sm">
                    <div><span class="font-medium">Name:</span> {{ auth()->user()->name }}</div>
                    <div><span class="font-medium">Email:</span> {{ auth()->user()->email }}</div>
                    <div><span class="font-medium">Role:</span> {{ ucfirst(auth()->user()->role) }}</div>
                    @if(auth()->user()->phone)
                        <div><span class="font-medium">Phone:</span> {{ auth()->user()->phone }}</div>
                    @endif
                    @if(auth()->user()->location)
                        <div><span class="font-medium">Location:</span> {{ auth()->user()->location }}</div>
                    @endif
                </div>
                <a href="{{ route('profile.edit') }}" class="btn-outline mt-4 inline-block">Edit Profile</a>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Activity</h3>
                <div class="space-y-3">
                    @if($recentSessions && $recentSessions->count() > 0)
                        @foreach($recentSessions as $session)
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                <div class="text-accent">📅</div>
                                <div class="flex-1">
                                    <div class="text-sm font-medium">Mentorship Session</div>
                                    <div class="text-xs text-gray-600">{{ $session->session_date->format('M j, Y') }}</div>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-full 
                                    @if($session->status === 'completed') bg-green-100 text-green-800
                                    @elseif($session->status === 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($session->status) }}
                                </span>
                            </div>
                        @endforeach
                    @elseif($recentAssessments && $recentAssessments->count() > 0)
                        @foreach($recentAssessments as $assessment)
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                <div class="text-accent">📊</div>
                                <div class="flex-1">
                                    <div class="text-sm font-medium">PathFinder Assessment</div>
                                    <div class="text-xs text-gray-600">{{ $assessment->created_at->format('M j, Y') }}</div>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-800">
                                    Completed
                                </span>
                            </div>
                        @endforeach
                    @else
                        <div class="text-gray-600 text-sm">
                            <p>No recent activity to display.</p>
                            <p class="mt-2">Start by taking a PathFinder assessment or booking a mentorship session!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Featured Content -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Content</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Featured Programs -->
                @if($featuredPrograms && $featuredPrograms->count() > 0)
                    @foreach($featuredPrograms as $program)
                        <div class="card hover:shadow-xl transition-shadow duration-300">
                            <div class="bg-gradient-to-br from-primary to-primary-800 h-32 rounded-t-lg flex items-center justify-center">
                                <div class="text-white text-center">
                                    <div class="text-2xl mb-1">🎓</div>
                                    <div class="text-sm opacity-90">{{ $program->institution }}</div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 mb-2">{{ $program->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($program->description, 80) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-accent font-semibold">{{ number_format($program->tuition_fee) }} XAF</span>
                                    <a href="{{ route('programs.show', $program) }}" class="btn-primary text-sm px-3 py-1">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Featured Opportunities -->
                @if($featuredOpportunities && $featuredOpportunities->count() > 0)
                    @foreach($featuredOpportunities as $opportunity)
                        <div class="card hover:shadow-xl transition-shadow duration-300">
                            <div class="bg-gradient-to-br from-accent to-accent-800 h-32 rounded-t-lg flex items-center justify-center">
                                <div class="text-white text-center">
                                    <div class="text-2xl mb-1">💼</div>
                                    <div class="text-sm opacity-90">{{ $opportunity->organization }}</div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 mb-2">{{ $opportunity->title }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($opportunity->description, 80) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-accent font-semibold">{{ ucfirst($opportunity->type) }}</span>
                                    @if($opportunity->application_link)
                                        <a href="{{ $opportunity->application_link }}" target="_blank" class="btn-primary text-sm px-3 py-1">
                                            Apply Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 