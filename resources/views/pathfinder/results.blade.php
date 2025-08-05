@extends('layouts.app')

@section('title', 'Your PathFinder Results')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">🎯 Your Personalized Recommendations</h1>
            <p class="text-xl text-gray-600">Based on your PathFinder assessment, here are our tailored recommendations for your academic and career journey.</p>
        </div>

        @if(isset($recommendations))
        <!-- Recommendations Section -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $recommendations['title'] }}</h2>
                <p class="text-lg text-gray-600">{{ $recommendations['subtitle'] }}</p>
            </div>

            <!-- Recommended Programs -->
            @if(isset($recommendations['programs']) && count($recommendations['programs']) > 0)
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">📚 Recommended Programs</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($recommendations['programs'] as $program)
                    <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $program['name'] }}</h4>
                        <p class="text-gray-600 mb-3">{{ $program['description'] }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-blue-600 font-medium">Duration: {{ $program['duration'] }}</span>
                            <span class="text-sm text-green-600 font-medium">High Demand</span>
                        </div>
                        @if(isset($program['careers']))
                        <div class="mt-3">
                            <p class="text-sm font-medium text-gray-700 mb-1">Career Paths:</p>
                            <div class="flex flex-wrap gap-1">
                                @foreach($program['careers'] as $career)
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">{{ $career }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Career Options for Degree Holders -->
            @if(isset($recommendations['career_options']))
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">💼 Career Opportunities</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($recommendations['career_options'] as $option)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-green-500 mr-3">✓</span>
                        <span class="text-gray-700">{{ $option }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Next Steps -->
            @if(isset($recommendations['next_steps']))
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">🚀 Your Next Steps</h3>
                <div class="space-y-3">
                    @foreach($recommendations['next_steps'] as $index => $step)
                    <div class="flex items-start">
                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold mr-3 mt-0.5">{{ $index + 1 }}</span>
                        <span class="text-gray-700">{{ $step }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @endif

        <!-- Mentor Consultation Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg shadow-lg p-8 mb-8">
            <div class="text-center text-white mb-6">
                <h2 class="text-3xl font-bold mb-2">{{ $recommendations['mentor_consultation']['title'] }}</h2>
                <p class="text-xl opacity-90">{{ $recommendations['mentor_consultation']['description'] }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Benefits -->
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-white mb-4">🎯 What You'll Get</h3>
                    <div class="space-y-3">
                        @foreach($recommendations['mentor_consultation']['benefits'] as $benefit)
                        <div class="flex items-center">
                            <span class="text-yellow-300 mr-3">★</span>
                            <span class="text-white">{{ $benefit }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Consultation Details -->
                <div class="bg-white bg-opacity-10 rounded-lg p-6">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">{{ $recommendations['mentor_consultation']['price'] }}</div>
                        <p class="text-white opacity-90 mb-4">for 15 minutes</p>
                        <p class="text-yellow-300 font-semibold text-lg mb-6">{{ $recommendations['mentor_consultation']['impact'] }}</p>
                        
                        <a href="{{ route('mentorship.index') }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-8 rounded-lg text-lg transition-colors">
                            Book Your Session Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg text-center">
                Back to Dashboard
            </a>
            <a href="{{ route('pathfinder.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center">
                Take Assessment Again
            </a>
            <a href="{{ route('schools.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-center">
                Explore Schools
            </a>
        </div>
    </div>
</div>
@endsection 