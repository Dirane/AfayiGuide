@extends('layouts.app')

@section('title', 'Expert Mentorship for the Next Level')
@section('description', 'Book sessions with experienced mentors and counselors for personalized guidance to help you reach the next level through education.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Expert Mentorship for the Next Level</h1>
                <p class="text-xl text-gray-200">Connect with experienced mentors who will guide you to make the right choices for your next level</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Mentorship Overview -->
        <div class="card mb-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">How We Help You Level Up</h2>
                <p class="text-lg text-gray-600 mb-8">Get personalized guidance from experienced professionals to help you make informed decisions that lead to the next level through the right educational choices.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Book Your Session</h3>
                        <p class="text-gray-600">Choose your session duration and provide your details for personalized guidance.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Get Expert Assignment</h3>
                        <p class="text-gray-600">We'll assign the best mentor for your specific next level goals.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Level Up</h3>
                        <p class="text-gray-600">Get personalized advice and actionable steps that lead to the next level.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Session Options -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Choose Your Level-Up Investment</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- 15 Minutes Session -->
                <div class="card hover:shadow-lg transition-shadow border-2 border-transparent hover:border-primary">
                    <div class="p-6 text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Quick Level Boost</h3>
                        <p class="text-gray-600 mb-4">Perfect for specific questions and quick level-up guidance</p>
                        <div class="text-3xl font-bold text-primary mb-2">1,000 XAF</div>
                        <p class="text-sm text-gray-500 mb-6">15 minutes</p>
                        <ul class="text-left text-sm text-gray-600 mb-6 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Level-up guidance
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Career advancement advice
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
                <div class="card hover:shadow-lg transition-shadow border-2 border-transparent hover:border-primary">
                    <div class="p-6 text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Comprehensive Level Plan</h3>
                        <p class="text-gray-600 mb-4">Detailed guidance for your complete next level strategy</p>
                        <div class="text-3xl font-bold text-primary mb-2">1,500 XAF</div>
                        <p class="text-sm text-gray-500 mb-6">30 minutes</p>
                        <ul class="text-left text-sm text-gray-600 mb-6 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Complete level roadmap
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Educational path planning
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Long-term level strategy
                            </li>
                        </ul>
                        <a href="{{ route('mentorship.create', ['duration' => '30min']) }}" class="btn-primary w-full">Book 30min Session</a>
                    </div>
                </div>

                <!-- 1 Hour Session -->
                <div class="card hover:shadow-lg transition-shadow border-2 border-primary">
                    <div class="p-6 text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Level Transformation Session</h3>
                        <p class="text-gray-600 mb-4">Complete next level transformation with detailed action plan</p>
                        <div class="text-3xl font-bold text-primary mb-2">2,500 XAF</div>
                        <p class="text-sm text-gray-500 mb-6">1 hour</p>
                        <ul class="text-left text-sm text-gray-600 mb-6 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Complete level transformation
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Comprehensive level plan
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Ongoing level guidance
                            </li>
                        </ul>
                        <a href="{{ route('mentorship.create', ['duration' => '1hour']) }}" class="btn-primary w-full">Book 1hr Session</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Mentorship -->
        <div class="card">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Why This Will Level You Up</h2>
                <p class="text-lg text-gray-600">Our mentors have helped thousands of students reach the next level through the right educational choices</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Proven Results</h3>
                    <p class="text-gray-600 text-sm">Our mentors have guided students to reach the next level and achieve their goals</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Expert Guidance</h3>
                    <p class="text-gray-600 text-sm">Learn from professionals who have reached the next level</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Level-Up</h3>
                    <p class="text-gray-600 text-sm">Get insights that will elevate your educational and career journey</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-yellow-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Worth Every Penny</h3>
                    <p class="text-gray-600 text-sm">Small investment for level-up results that last forever</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 