@extends('layouts.app')

@section('title', 'Browse Schools')
@section('description', 'Discover educational institutions in Cameroon.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Browse Schools</h1>
                <p class="text-xl text-gray-200">Discover educational institutions across Cameroon</p>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @auth
            <div class="mb-4 flex justify-end">
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-outline">
                        ← Back to Admin Dashboard
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn-outline">
                        ← Back to {{ auth()->user()->getDashboardTitle() }}
                    </a>
                @endif
            </div>
        @endauth
        <div class="card mb-8">
            <form method="GET" action="{{ route('schools.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                           placeholder="Search schools..."
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>
                
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <select name="type" id="type" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                        <option value="">All Types</option>
                        <option value="university" {{ request('type') == 'university' ? 'selected' : '' }}>University</option>
                        <option value="college" {{ request('type') == 'college' ? 'selected' : '' }}>College</option>
                        <option value="institute" {{ request('type') == 'institute' ? 'selected' : '' }}>Institute</option>
                        <option value="polytechnic" {{ request('type') == 'polytechnic' ? 'selected' : '' }}>Polytechnic</option>
                        <option value="vocational" {{ request('type') == 'vocational' ? 'selected' : '' }}>Vocational</option>
                        <option value="secondary" {{ request('type') == 'secondary' ? 'selected' : '' }}>Secondary</option>
                        <option value="primary" {{ request('type') == 'primary' ? 'selected' : '' }}>Primary</option>
                    </select>
                </div>
                
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="location" id="location" value="{{ request('location') }}" 
                           placeholder="City or region..."
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>
                
                <div class="flex items-end">
                    <button type="submit" class="btn-primary w-full">
                        Search Schools
                    </button>
                </div>
            </form>
        </div>

        <!-- Results -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($schools as $school)
                <div class="card hover:shadow-lg transition-shadow">
                    @if($school->image)
                        <img src="{{ Storage::url($school->image) }}" alt="{{ $school->name }}" 
                             class="w-full h-48 object-cover rounded-t-lg">
                    @else
                        <div class="w-full h-48 bg-primary rounded-t-lg flex items-center justify-center">
                            <span class="text-white text-4xl font-bold">{{ substr($school->name, 0, 1) }}</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $school->name }}</h3>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-primary-100 text-primary-800">
                                {{ ucfirst($school->type) }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-3">{{ Str::limit($school->description, 100) }}</p>
                        
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $school->location }}
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <a href="{{ route('schools.show', $school) }}" class="btn-primary">
                                View Details
                            </a>
                            @if($school->website)
                                <a href="{{ $school->website }}" target="_blank" class="text-primary hover:text-primary-800 text-sm">
                                    Visit Website
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No schools found</h3>
                        <p class="mt-1 text-sm text-gray-500">Try adjusting your search criteria.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if($schools->hasPages())
            <div class="mt-8">
                {{ $schools->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 