@extends('layouts.app')

@section('title', 'AfayiGuide - Your Educational Pathway')
@section('description', 'Discover schools and opportunities in Cameroon. Take the PathFinder assessment to get personalized guidance.')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-primary to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Your Pathway to
                <span class="text-accent">Educational Success</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">
                Discover schools, opportunities, and get personalized guidance for your educational journey in Cameroon.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('schools.index') }}" class="btn-accent text-lg px-8 py-4">
                    Explore Schools
                </a>
                @auth
                    @if(auth()->user()->canUsePathfinder())
                        <a href="{{ route('pathfinder.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent text-lg px-8 py-4">
                            Take PathFinder Assessment
                        </a>
                    @endif
                @else
                    <a href="{{ route('pathfinder.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent text-lg px-8 py-4">
                        Take PathFinder Assessment
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">What We Offer</h2>
            <p class="text-lg text-gray-600">Comprehensive tools and services to guide your educational journey</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Browse Schools</h3>
                <p class="text-gray-600 mb-4">Explore schools across Cameroon with detailed information about requirements and application processes.</p>
                <a href="{{ route('schools.index') }}" class="btn-primary mt-4 inline-block">Explore Schools</a>
            </div>
            
            @auth
                @if(auth()->user()->canUsePathfinder())
                <div class="text-center">
                    <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">PathFinder Assessment</h3>
                    <p class="text-gray-600 mb-4">Take our comprehensive assessment to get personalized school and program recommendations.</p>
                    <a href="{{ route('pathfinder.index') }}" class="btn-primary mt-4 inline-block">Start Assessment</a>
                </div>
                @endif
            @else
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">PathFinder Assessment</h3>
                <p class="text-gray-600 mb-4">Take our comprehensive assessment to get personalized school and program recommendations.</p>
                <a href="{{ route('pathfinder.index') }}" class="btn-primary mt-4 inline-block">Start Assessment</a>
            </div>
            @endauth
            
            @auth
                @if(auth()->user()->canBookMentorship())
                <div class="text-center">
                    <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">1-on-1 Mentorship</h3>
                    <p class="text-gray-600 mb-4">Get personalized guidance from experienced mentors to help you make the right educational choices.</p>
                    <a href="{{ route('mentorship.index') }}" class="btn-primary mt-4 inline-block">Book Mentorship</a>
                </div>
                @endif
            @else
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">1-on-1 Mentorship</h3>
                <p class="text-gray-600 mb-4">Get personalized guidance from experienced mentors to help you make the right educational choices.</p>
                <a href="{{ route('mentorship.index') }}" class="btn-primary mt-4 inline-block">Book Mentorship</a>
            </div>
            @endauth
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-primary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8 text-gray-200">Join thousands of students who have found their educational path with AfayiGuide.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-accent text-lg px-8 py-4">Go to Dashboard</a>
            @else
                <a href="{{ route('register') }}" class="btn-accent text-lg px-8 py-4">Get Started</a>
                <a href="{{ route('login') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent text-lg px-8 py-4">Sign In</a>
            @endauth
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-3xl font-bold text-primary mb-2">{{ \App\Models\School::where('is_active', true)->count() }}+</div>
                <div class="text-gray-600">Schools</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-primary mb-2">{{ \App\Models\User::where('role', 'student')->count() }}+</div>
                <div class="text-gray-600">Students</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-primary mb-2">{{ \App\Models\User::where('role', 'mentor')->where('is_active', true)->count() }}+</div>
                <div class="text-gray-600">Mentors</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-primary mb-2">{{ \App\Models\PathfinderResponse::count() }}+</div>
                <div class="text-gray-600">Assessments</div>
            </div>
        </div>
    </div>
</div>

<!-- Footer CTA -->
<div class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold mb-4">Need Help Choosing?</h2>
        <p class="text-gray-300 mb-6">Our PathFinder assessment and mentorship services can help you make the right choice.</p>
        @auth
            @if(auth()->user()->canUsePathfinder())
                <a href="{{ route('pathfinder.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent">
                    Take Assessment Now
                </a>
            @endif
        @else
            <a href="{{ route('pathfinder.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent">
                Take Assessment Now
            </a>
        @endauth
    </div>
</div>
@endsection 