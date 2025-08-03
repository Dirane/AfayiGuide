@extends('layouts.app')

@section('title', 'Schools')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold">Educational Institutions</h1>
                <p class="text-gray-200 mt-2">Discover schools, universities, and colleges in Cameroon</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search and Filters -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Schools</label>
                        <input type="text" id="search" placeholder="Search by name, location..." 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Institution Type</label>
                        <select id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">All Types</option>
                            <option value="university">University</option>
                            <option value="polytechnic">Polytechnic</option>
                            <option value="college">College</option>
                            <option value="institute">Institute</option>
                            <option value="school">School</option>
                        </select>
                    </div>
                    <div>
                        <label for="region" class="block text-sm font-medium text-gray-700 mb-2">Region</label>
                        <select id="region" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">All Regions</option>
                            <option value="adamaoua">Adamaoua</option>
                            <option value="centre">Centre</option>
                            <option value="east">East</option>
                            <option value="far-north">Far North</option>
                            <option value="littoral">Littoral</option>
                            <option value="north">North</option>
                            <option value="north-west">North West</option>
                            <option value="south">South</option>
                            <option value="south-west">South West</option>
                            <option value="west">West</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="button" class="w-full bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">
                            Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schools Grid -->
        @if($schools->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($schools as $school)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <!-- School Logo/Image Section -->
                            <div class="flex items-center mb-4">
                                @if($school->logo)
                                    <!-- Display school logo if available -->
                                    <img src="{{ Storage::url($school->logo) }}" alt="{{ $school->name }}" 
                                         class="h-12 w-12 rounded-full object-cover">
                                @else
                                    <!-- Fallback to school initial if no logo -->
                                    <div class="h-12 w-12 rounded-full bg-primary flex items-center justify-center">
                                        <span class="text-white font-semibold">{{ substr($school->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <div class="ml-4 flex-1">
                                    <!-- School name and type -->
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $school->name }}</h3>
                                    <div class="flex items-center mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ ucfirst($school->type) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $school->city }}, {{ $school->region }}
                                </div>
                            </div>

                            <!-- Contact Info -->
                            @if($school->email || $school->phone || $school->website)
                                <div class="mb-4 space-y-2">
                                    @if($school->email)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <a href="mailto:{{ $school->email }}" class="text-primary hover:text-primary/80">{{ $school->email }}</a>
                                        </div>
                                    @endif
                                    @if($school->phone)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            <a href="tel:{{ $school->phone }}" class="text-primary hover:text-primary/80">{{ $school->phone }}</a>
                                        </div>
                                    @endif
                                    @if($school->website)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                            </svg>
                                            <a href="{{ $school->website }}" target="_blank" class="text-primary hover:text-primary/80">Visit Website</a>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Programs Count -->
                            <div class="mb-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $school->getProgramsCount() }} Programs
                                </span>
                            </div>

                            <!-- Action Button -->
                            <a href="{{ route('schools.show', $school) }}" 
                               class="block w-full bg-primary text-white text-center py-2 px-4 rounded-md hover:bg-primary/90 transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $schools->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">🏫</div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No schools found</h3>
                <p class="text-gray-500">Try adjusting your search criteria.</p>
            </div>
        @endif
    </div>
</div>
@endsection 