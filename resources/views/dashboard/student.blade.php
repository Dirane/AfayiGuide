@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('description', 'Your personalized student dashboard on AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Welcome back, {{ $user->name }}!</h1>
                <p class="text-xl text-gray-200">Your educational journey dashboard</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📊</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalAssessments }}</h3>
                <p class="text-gray-600 text-sm">PathFinder Assessments</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">💬</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $totalSessions }}</h3>
                <p class="text-gray-600 text-sm">Mentorship Sessions</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">📅</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $upcomingSessions }}</h3>
                <p class="text-gray-600 text-sm">Upcoming Sessions</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl text-accent mb-2">👨‍🏫</div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $mentorsCount }}</h3>
                <p class="text-gray-600 text-sm">Available Mentors</p>
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

            <!-- Recent Activity -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    @if($recentAssessments->count() > 0)
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Recent Assessments</h4>
                            @foreach($recentAssessments as $assessment)
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">PathFinder Assessment</p>
                                        <p class="text-xs text-gray-500">{{ $assessment->created_at->format('M j, Y') }}</p>
                                    </div>
                                    <a href="{{ route('pathfinder.download', $assessment->id) }}" class="text-primary text-sm hover:text-primary-800">
                                        Download Report
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($bookedSessions->count() > 0)
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Recent Sessions</h4>
                            @foreach($bookedSessions as $session)
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $session->mentor->name ?? 'Mentor' }}</p>
                                        <p class="text-xs text-gray-500">{{ $session->scheduled_at ? $session->scheduled_at->format('M j, Y') : 'Scheduled' }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                        @if($session->status === 'completed') bg-green-100 text-green-800
                                        @elseif($session->status === 'pending') bg-yellow-100 text-yellow-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($session->status) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($recentAssessments->count() == 0 && $bookedSessions->count() == 0)
                        <p class="text-gray-500 text-sm">No recent activity. Start by taking a PathFinder assessment!</p>
                    @endif
                </div>
            </div>

            <!-- Platform Stats -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Platform Overview</h3>
                <div class="space-y-4">
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
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Active Mentors</span>
                        <span class="text-sm font-medium text-gray-900">{{ $mentorsCount }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Content -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Content</h2>
            
            <!-- Featured Schools -->
            @if($featuredSchools->count() > 0)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Schools</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($featuredSchools as $school)
                            <div class="card hover:shadow-lg transition-shadow">
                                @if($school->image)
                                    <img src="{{ Storage::url($school->image) }}" alt="{{ $school->name }}" class="w-full h-32 object-cover rounded-t-lg">
                                @endif
                                <div class="p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ $school->name }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($school->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs text-gray-500">{{ $school->location }}</span>
                                        <a href="{{ route('schools.show', $school) }}" class="text-primary text-sm hover:text-primary-800">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Featured Programs -->
            @if($featuredPrograms->count() > 0)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Programs</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($featuredPrograms as $program)
                            <div class="card hover:shadow-lg transition-shadow">
                                @if($program->image)
                                    <img src="{{ Storage::url($program->image) }}" alt="{{ $program->name }}" class="w-full h-32 object-cover rounded-t-lg">
                                @endif
                                <div class="p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ $program->name }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($program->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs text-gray-500">{{ number_format($program->tuition_fee) }} XAF</span>
                                        <a href="{{ route('programs.show', $program) }}" class="text-primary text-sm hover:text-primary-800">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Featured Opportunities -->
            @if($featuredOpportunities->count() > 0)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Opportunities</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($featuredOpportunities as $opportunity)
                            <div class="card hover:shadow-lg transition-shadow">
                                @if($opportunity->image)
                                    <img src="{{ Storage::url($opportunity->image) }}" alt="{{ $opportunity->title }}" class="w-full h-32 object-cover rounded-t-lg">
                                @endif
                                <div class="p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ $opportunity->title }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($opportunity->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs text-gray-500">{{ ucfirst($opportunity->type) }}</span>
                                        <a href="{{ route('opportunities.show', $opportunity) }}" class="text-primary text-sm hover:text-primary-800">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 