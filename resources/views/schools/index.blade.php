@extends('layouts.app')

@section('title', 'Browse Schools & Institutions')
@section('description', 'Discover schools, universities, and institutions with admission requirements and application assistance.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Browse Schools & Institutions</h1>
                <p class="text-xl text-gray-200">Discover schools, universities, and institutions with admission requirements and application assistance</p>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('schools.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Schools</label>
                        <input type="text" name="search" id="search" 
                               class="input-field" placeholder="Search by name, location, type..."
                               value="{{ request('search') }}">
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Institution Type</label>
                        <select name="type" id="type" class="input-field">
                            <option value="">All Types</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <select name="location" id="location" class="input-field">
                            <option value="">All Locations</option>
                            @foreach($locations as $location)
                                <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                                    {{ $location }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Program -->
                    <div>
                        <label for="program" class="block text-sm font-medium text-gray-700 mb-2">Program Offered</label>
                        <select name="program" id="program" class="input-field">
                            <option value="">All Programs</option>
                            @foreach($programs as $program)
                                <option value="{{ $program }}" {{ request('program') == $program ? 'selected' : '' }}>
                                    {{ $program }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Sort and Clear -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-700">Sort by:</span>
                        <select name="sort" class="input-field text-sm">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="location" {{ request('sort') == 'location' ? 'selected' : '' }}>Location</option>
                            <option value="type" {{ request('sort') == 'type' ? 'selected' : '' }}>Type</option>
                            <option value="application_deadline" {{ request('sort') == 'application_deadline' ? 'selected' : '' }}>Deadline</option>
                        </select>
                        <select name="direction" class="input-field text-sm">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button type="submit" class="btn-primary">
                            Apply Filters
                        </button>
                        <a href="{{ route('schools.index') }}" class="btn-outline">
                            Clear All
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-600">
                Found {{ $schools->total() }} school{{ $schools->total() !== 1 ? 's' : '' }}
            </p>
        </div>

        <!-- Schools Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($schools as $school)
                <div class="card hover:shadow-xl transition-shadow duration-300">
                    <!-- School Header -->
                    <div class="bg-gradient-to-br from-primary to-primary-800 h-48 rounded-t-lg flex items-center justify-center relative">
                        <div class="text-white text-center">
                            <div class="text-4xl mb-2">
                                @switch($school->type)
                                    @case('university')
                                        🏛️
                                        @break
                                    @case('college')
                                        🎓
                                        @break
                                    @case('institute')
                                        🏫
                                        @break
                                    @case('polytechnic')
                                        ⚙️
                                        @break
                                    @default
                                        🏢
                                @endswitch
                            </div>
                            <div class="text-sm opacity-90">{{ ucfirst($school->type) }}</div>
                        </div>
                        
                        <!-- Application Status Badge -->
                        <div class="absolute top-4 right-4">
                            @if($school->isApplicationOpen())
                                <span class="bg-green-400 text-green-900 px-2 py-1 rounded-full text-xs font-medium">
                                    Open
                                </span>
                            @else
                                <span class="bg-red-400 text-red-900 px-2 py-1 rounded-full text-xs font-medium">
                                    Closed
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- School Details -->
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $school->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($school->description, 120) }}</p>
                        
                        <!-- School Info -->
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Location:</span>
                                <span>{{ $school->location }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Type:</span>
                                <span class="capitalize">{{ $school->type }}</span>
                            </div>
                            @if($school->application_fee)
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="font-medium w-20">Fee:</span>
                                    <span class="font-semibold text-accent">{{ number_format($school->application_fee) }} {{ $school->currency }}</span>
                                </div>
                            @endif
                            @if($school->application_deadline)
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="font-medium w-20">Deadline:</span>
                                    <span class="{{ $school->application_deadline->isPast() ? 'text-red-600' : '' }}">
                                        {{ $school->application_deadline->format('M j, Y') }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <a href="{{ route('schools.show', $school) }}" class="btn-primary flex-1 text-center">
                                View Details
                            </a>
                            @if($school->website)
                                <a href="{{ $school->website }}" target="_blank" class="btn-outline">
                                    Website
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-6xl mb-4">🏫</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No schools found</h3>
                    <p class="text-gray-600 mb-4">Try adjusting your search criteria or filters.</p>
                    <a href="{{ route('schools.index') }}" class="btn-primary">
                        Clear Filters
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($schools->hasPages())
            <div class="mt-8">
                {{ $schools->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 