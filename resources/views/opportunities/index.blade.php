<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opportunities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('opportunities.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                       placeholder="Search opportunities..." 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            </div>
                            
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                <select name="type" id="type" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                                    <option value="">All Types</option>
                                    <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="job" {{ request('type') == 'job' ? 'selected' : '' }}>Job</option>
                                    <option value="scholarship" {{ request('type') == 'scholarship' ? 'selected' : '' }}>Scholarship</option>
                                    <option value="volunteer" {{ request('type') == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                                <input type="text" name="location" id="location" value="{{ request('location') }}" 
                                       placeholder="Enter location..." 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            </div>
                            
                            <div class="flex items-end">
                                <button type="submit" class="btn-primary w-full">
                                    Filter
                                </button>
                            </div>
                        </div>
                        
                        @if(request('search') || request('type') || request('location'))
                            <div class="flex justify-center">
                                <a href="{{ route('opportunities.index') }}" class="btn-secondary">
                                    Clear Filters
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Opportunities Grid -->
            @if($opportunities->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($opportunities as $opportunity)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                            <!-- Image Section -->
                            @if($opportunity->first_image_url)
                                <div class="aspect-w-16 aspect-h-9">
                                    <img src="{{ $opportunity->first_image_url }}" 
                                         alt="{{ $opportunity->title }}" 
                                         class="w-full h-48 object-cover">
                                </div>
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Content Section -->
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary text-white">
                                        {{ ucfirst($opportunity->type) }}
                                    </span>
                                    @if($opportunity->deadline)
                                        <span class="text-sm text-gray-500">
                                            Deadline: {{ \Carbon\Carbon::parse($opportunity->deadline)->format('M d, Y') }}
                                        </span>
                                    @endif
                                </div>
                                
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $opportunity->title }}</h3>
                                
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                                    {{ Str::limit($opportunity->description, 120) }}
                                </p>
                                
                                @if($opportunity->location)
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $opportunity->location }}
                                    </div>
                                @endif
                                
                                @if($opportunity->requirements)
                                    <div class="mb-4">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Requirements:</h4>
                                        <p class="text-sm text-gray-600 line-clamp-2">
                                            {{ Str::limit($opportunity->requirements, 100) }}
                                        </p>
                                    </div>
                                @endif
                                
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('admin.opportunities.show', $opportunity) }}" 
                                       class="btn-primary text-sm px-4 py-2">
                                        View Details
                                    </a>
                                    
                                    @if($opportunity->application_link)
                                        <a href="{{ $opportunity->application_link }}" 
                                           target="_blank" 
                                           class="btn-secondary text-sm px-4 py-2">
                                            Apply Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $opportunities->links() }}
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No opportunities found</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            @if(request('search') || request('type') || request('location'))
                                Try adjusting your search criteria.
                            @else
                                Check back later for new opportunities.
                            @endif
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 