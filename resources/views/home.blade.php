@extends('layouts.app')

@section('title', 'AfayiGuide - Your Gateway to the Next Level')
@section('description', 'We guide you toward life success through the right educational path—find programs, explore opportunities, and get personalized mentorship.')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-primary to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Your Gateway to
                <span class="text-accent">the Next Level</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">
                We guide you toward life success through the right educational path—find programs, explore opportunities, and get personalized mentorship.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('schools.index') }}" class="btn-accent text-lg px-8 py-4">
                    Explore Programs
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
            <h2 class="text-3xl font-bold text-gray-900 mb-4">How We Help You Level Up</h2>
            <p class="text-lg text-gray-600">Comprehensive tools and services to help you reach the next level through educational excellence</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Find Your Perfect Program</h3>
                <p class="text-gray-600 mb-4">Discover programs across Cameroon that will take you to the next level in your career and life.</p>
                <a href="{{ route('schools.index') }}" class="btn-primary mt-4 inline-block">Explore Programs</a>
            </div>
            
            @auth
                @if(auth()->user()->canUsePathfinder())
                <div class="text-center">
                    <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Discover Your Path</h3>
                    <p class="text-gray-600 mb-4">Take our comprehensive assessment to find the educational path that will elevate you to the next level.</p>
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
                <h3 class="text-xl font-semibold mb-2">Discover Your Path</h3>
                <p class="text-gray-600 mb-4">Take our comprehensive assessment to find the educational path that will elevate you to the next level.</p>
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
                    <h3 class="text-xl font-semibold mb-2">Get Expert Mentorship</h3>
                    <p class="text-gray-600 mb-4">Connect with experienced mentors who will guide you to make the right choices for your next level.</p>
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
                <h3 class="text-xl font-semibold mb-2">Get Expert Mentorship</h3>
                <p class="text-gray-600 mb-4">Connect with experienced mentors who will guide you to make the right choices for your next level.</p>
                <a href="{{ route('mentorship.index') }}" class="btn-primary mt-4 inline-block">Book Mentorship</a>
            </div>
            @endauth
        </div>
    </div>
</div>

<!-- About Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose AfayiGuide?</h2>
            <p class="text-lg text-gray-600">We believe that the right educational path is your gateway to the next level</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Personalized Guidance</h3>
                <p class="text-gray-600">We understand that every student's path to the next level is unique. Our personalized approach ensures you get the guidance that fits your goals.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Proven Results</h3>
                <p class="text-gray-600">Our methods have helped countless students reach the next level and build successful careers through the right educational choices.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Expert Mentors</h3>
                <p class="text-gray-600">Connect with experienced professionals who have reached the next level and can guide you through your educational journey.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Comprehensive Support</h3>
                <p class="text-gray-600">From program selection to application assistance, we provide end-to-end support to ensure your educational success leads to the next level.</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Reach the Next Level?</h2>
        <p class="text-xl mb-8">Join thousands of students who have elevated their lives through the right educational choices.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="btn-accent text-lg px-8 py-4">
                Start Your Journey
            </a>
            <a href="{{ route('pathfinder.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent text-lg px-8 py-4">
                Take Assessment
            </a>
        </div>
    </div>
</div>
@endsection 