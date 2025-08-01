@extends('layouts.app')

@section('title', 'Home')
@section('description', 'Supporting GCE A-Level and HND graduates in Cameroon transition to university or degree programs.')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-primary to-primary-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Your Path to Success
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">
                Supporting GCE A-Level and HND graduates in Cameroon transition to university or degree programs
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('programs.index') }}" class="btn-accent text-lg px-8 py-4">
                    Find Programs
                </a>
                <a href="{{ route('pathfinder.index') }}" class="btn-outline text-lg px-8 py-4 border-white text-white hover:bg-white hover:text-primary">
                    Take PathFinder
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">How AfayiGuide Helps You</h2>
            <p class="text-xl text-gray-600">Comprehensive support for your educational journey</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Program Finder -->
            <div class="card text-center">
                <div class="text-4xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Program Finder</h3>
                <p class="text-gray-600">Search and filter university/degree programs by location, field, tuition, and more.</p>
                <a href="{{ route('programs.index') }}" class="btn-primary mt-4 inline-block">Explore Programs</a>
            </div>

            <!-- PathFinder -->
            <div class="card text-center">
                <div class="text-4xl mb-4">🎯</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">PathFinder</h3>
                <p class="text-gray-600">Get personalized recommendations based on your background, goals, and aspirations.</p>
                <a href="{{ route('pathfinder.index') }}" class="btn-primary mt-4 inline-block">Start Assessment</a>
            </div>

            <!-- Mentorship -->
            <div class="card text-center">
                <div class="text-4xl mb-4">👥</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">1-on-1 Mentorship</h3>
                <p class="text-gray-600">Book sessions with experienced mentors and counselors for personalized guidance.</p>
                <a href="{{ route('mentorship.index') }}" class="btn-primary mt-4 inline-block">Book Session</a>
            </div>

            <!-- Opportunities -->
            <div class="card text-center">
                <div class="text-4xl mb-4">💼</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Opportunities Board</h3>
                <p class="text-gray-600">Discover scholarships, internships, jobs, and admissions opportunities.</p>
                <a href="{{ route('opportunities.index') }}" class="btn-primary mt-4 inline-block">View Opportunities</a>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="py-16 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Impact</h2>
            <p class="text-xl text-gray-200">Supporting students across Cameroon</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold text-accent mb-2">500+</div>
                <div class="text-gray-200">Programs Listed</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-accent mb-2">1000+</div>
                <div class="text-gray-200">Students Helped</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-accent mb-2">50+</div>
                <div class="text-gray-200">Expert Mentors</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-accent mb-2">200+</div>
                <div class="text-gray-200">Opportunities Posted</div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">What Students Say</h2>
            <p class="text-xl text-gray-600">Success stories from our community</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        A
                    </div>
                    <div>
                        <div class="font-semibold">Alice M.</div>
                        <div class="text-sm text-gray-600">GCE A-Level Graduate</div>
                    </div>
                </div>
                <p class="text-gray-600">"AfayiGuide helped me find the perfect Computer Science program. The PathFinder assessment was incredibly accurate!"</p>
            </div>

            <div class="card">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        B
                    </div>
                    <div>
                        <div class="font-semibold">Boris K.</div>
                        <div class="text-sm text-gray-600">HND Graduate</div>
                    </div>
                </div>
                <p class="text-gray-600">"The mentorship sessions were invaluable. My mentor helped me navigate the application process step by step."</p>
            </div>

            <div class="card">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        C
                    </div>
                    <div>
                        <div class="font-semibold">Claire N.</div>
                        <div class="text-sm text-gray-600">Scholarship Recipient</div>
                    </div>
                </div>
                <p class="text-gray-600">"I found a scholarship opportunity through AfayiGuide that I never would have discovered otherwise. Life-changing!"</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 bg-accent text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8 text-accent-100">Join thousands of students who have found their path with AfayiGuide</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('pathfinder.index') }}" class="btn-primary bg-white text-accent hover:bg-gray-100">
                Take PathFinder Assessment
            </a>
            <a href="{{ route('programs.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-accent">
                Browse Programs
            </a>
        </div>
    </div>
</div>
@endsection 