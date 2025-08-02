<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Search -->
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Opportunities</label>
                <input wire:model="search" type="text" id="search" 
                       class="input-field" placeholder="Search by title, organization, location...">
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <select wire:model="type" id="type" class="input-field">
                    <option value="">All Types</option>
                    @foreach($types as $typeOption)
                        <option value="{{ $typeOption }}">{{ ucfirst($typeOption) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <select wire:model="location" id="location" class="input-field">
                    <option value="">All Locations</option>
                    @foreach($locations as $locationOption)
                        <option value="{{ $locationOption }}">{{ $locationOption }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Organization -->
            <div>
                <label for="organization" class="block text-sm font-medium text-gray-700 mb-2">Organization</label>
                <select wire:model="organization" id="organization" class="input-field">
                    <option value="">All Organizations</option>
                    @foreach($organizations as $organizationOption)
                        <option value="{{ $organizationOption }}">{{ $organizationOption }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Amount Range -->
            <div>
                <label for="minAmount" class="block text-sm font-medium text-gray-700 mb-2">Min Amount (XAF)</label>
                <input wire:model="minAmount" type="number" id="minAmount" 
                       class="input-field" placeholder="0">
            </div>

            <div>
                <label for="maxAmount" class="block text-sm font-medium text-gray-700 mb-2">Max Amount (XAF)</label>
                <input wire:model="maxAmount" type="number" id="maxAmount" 
                       class="input-field" placeholder="1000000">
            </div>
        </div>

        <!-- Clear Filters Button -->
        <div class="mt-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-700">Sort by:</span>
                <button wire:click="sortBy('title')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'title' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Title
                </button>
                <button wire:click="sortBy('deadline')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'deadline' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Deadline
                </button>
                <button wire:click="sortBy('amount')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'amount' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Amount
                </button>
            </div>
            
            <div class="flex space-x-2">
                <button wire:click="applyFilters" class="btn-primary">
                    Apply Filters
                </button>
                <button wire:click="clearFilters" class="btn-outline">
                    Clear All
                </button>
            </div>
        </div>
    </div>

    <!-- Results Count -->
    <div class="mb-6">
        <p class="text-gray-600">
            Found {{ $opportunities->total() }} opportunity{{ $opportunities->total() !== 1 ? 'ies' : 'y' }}
        </p>
    </div>

    <!-- Opportunities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($opportunities as $opportunity)
            <div class="card hover:shadow-xl transition-shadow duration-300">
                <!-- Opportunity Header -->
                <div class="bg-gradient-to-br from-accent to-accent-800 h-48 rounded-t-lg flex items-center justify-center relative">
                    <div class="text-white text-center">
                        <div class="text-4xl mb-2">
                            @switch($opportunity->type)
                                @case('scholarship')
                                    🎓
                                    @break
                                @case('internship')
                                    💼
                                    @break
                                @case('job')
                                    👔
                                    @break
                                @case('workshop')
                                    🛠️
                                    @break
                                @case('conference')
                                    🎤
                                    @break
                                @default
                                    💡
                            @endswitch
                        </div>
                        <div class="text-sm opacity-90">{{ $opportunity->organization }}</div>
                    </div>
                    
                    <!-- Type Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="bg-white bg-opacity-20 text-white px-2 py-1 rounded-full text-xs font-medium">
                            {{ ucfirst($opportunity->type) }}
                        </span>
                    </div>
                </div>

                <!-- Opportunity Details -->
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $opportunity->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($opportunity->description, 120) }}</p>
                    
                    <!-- Opportunity Info -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Organization:</span>
                            <span>{{ $opportunity->organization }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Location:</span>
                            <span>{{ $opportunity->location }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Type:</span>
                            <span class="capitalize">{{ $opportunity->type }}</span>
                        </div>
                        @if($opportunity->amount)
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Amount:</span>
                                <span class="font-semibold text-accent">{{ number_format($opportunity->amount) }} {{ $opportunity->currency }}</span>
                            </div>
                        @endif
                        @if($opportunity->deadline)
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Deadline:</span>
                                <span class="{{ $opportunity->deadline->isPast() ? 'text-red-600' : '' }}">
                                    {{ $opportunity->deadline->format('M j, Y') }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        @if($opportunity->application_link)
                            <a href="{{ $opportunity->application_link }}" target="_blank" class="btn-primary flex-1 text-center">
                                Apply Now
                            </a>
                        @else
                            <button class="btn-primary flex-1 text-center" disabled>
                                Contact for Details
                            </button>
                        @endif
                        @if($opportunity->contact_email)
                            <a href="mailto:{{ $opportunity->contact_email }}" class="btn-outline">
                                Contact
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No opportunities found</h3>
                <p class="text-gray-600 mb-4">Try adjusting your search criteria or filters.</p>
                <button wire:click="clearFilters" class="btn-primary">
                    Clear Filters
                </button>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($opportunities->hasPages())
        <div class="mt-8">
            {{ $opportunities->links() }}
        </div>
    @endif
</div> 