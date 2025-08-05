@extends('layouts.app')

@section('title', '1-on-1 Mentorship')
@section('description', 'Book sessions with experienced mentors and counselors for personalized guidance.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">1-on-1 Mentorship</h1>
                <p class="text-xl text-gray-200">Book sessions with experienced mentors and counselors</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Mentorship Overview -->
        <div class="card mb-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">How Mentorship Works</h2>
                <p class="text-lg text-gray-600 mb-8">Get personalized guidance from experienced professionals to help you make informed decisions about your educational and career path.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Book a Session</h3>
                        <p class="text-gray-600">Choose your session duration and provide your details.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Get Assigned</h3>
                        <p class="text-gray-600">We'll assign the best mentor for your specific needs.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Receive Guidance</h3>
                        <p class="text-gray-600">Get personalized advice and actionable next steps.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Session Options -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Choose Your Session</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- 15 Minutes Session -->
                <div class="card hover:shadow-lg transition-shadow border-2 border-transparent hover:border-primary">
                    <div class="p-6 text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Quick Consultation</h3>
                        <p class="text-gray-600 mb-4">Perfect for specific questions and quick guidance</p>
                        <div class="text-3xl font-bold text-primary mb-2">1,000 XAF</div>
                        <p class="text-sm text-gray-500 mb-6">15 minutes</p>
                        <ul class="text-left text-sm text-gray-600 mb-6 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Specific question guidance
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Quick career advice
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Immediate next steps
                            </li>
                        </ul>
                        <a href="{{ route('mentorship.create', ['duration' => '15min']) }}" class="btn-primary w-full">Book 15min Session</a>
                    </div>
                </div>

                <!-- 30 Minutes Session -->
                <div class="card hover:shadow-lg transition-shadow border-2 border-primary">
                    <div class="p-6 text-center">
                        <div class="bg-primary rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Standard Session</h3>
                        <p class="text-gray-600 mb-4">Comprehensive guidance for your educational journey</p>
                        <div class="text-3xl font-bold text-primary mb-2">1,500 XAF</div>
                        <p class="text-sm text-gray-500 mb-6">30 minutes</p>
                        <ul class="text-left text-sm text-gray-600 mb-6 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Detailed career planning
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                School recommendations
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Application strategy
                            </li>
                        </ul>
                        <a href="{{ route('mentorship.create', ['duration' => '30min']) }}" class="btn-primary w-full">Book 30min Session</a>
                    </div>
                </div>

                <!-- 1 Hour Session -->
                <div class="card hover:shadow-lg transition-shadow border-2 border-transparent hover:border-primary">
                    <div class="p-6 text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Comprehensive Session</h3>
                        <p class="text-gray-600 mb-4">In-depth analysis and long-term planning</p>
                        <div class="text-3xl font-bold text-primary mb-2">2,500 XAF</div>
                        <p class="text-sm text-gray-500 mb-6">1 hour</p>
                        <ul class="text-left text-sm text-gray-600 mb-6 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Complete career roadmap
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Multiple school options
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Follow-up support
                            </li>
                        </ul>
                        <a href="{{ route('mentorship.create', ['duration' => '1hour']) }}" class="btn-primary w-full">Book 1hr Session</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="card mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <span class="text-blue-600 font-bold text-lg">1</span>
                    </div>
                    <h3 class="font-semibold mb-2">Book Session</h3>
                    <p class="text-sm text-gray-600">Choose your duration and fill in your details</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <span class="text-blue-600 font-bold text-lg">2</span>
                    </div>
                    <h3 class="font-semibold mb-2">Get Assigned</h3>
                    <p class="text-sm text-gray-600">We'll assign the best mentor for your needs</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <span class="text-blue-600 font-bold text-lg">3</span>
                    </div>
                    <h3 class="font-semibold mb-2">Receive Contact</h3>
                    <p class="text-sm text-gray-600">Mentor will contact you via WhatsApp</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                        <span class="text-blue-600 font-bold text-lg">4</span>
                    </div>
                    <h3 class="font-semibold mb-2">Get Guidance</h3>
                    <p class="text-sm text-gray-600">Receive personalized advice and next steps</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="card bg-primary text-white">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-4">Ready to Get Started?</h2>
                    <p class="text-lg mb-6">Book a session and take the first step toward your educational goals.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('pathfinder.index') }}" class="btn-accent">Take PathFinder First</a>
                        <a href="{{ route('schools.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-primary">Browse Schools</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 