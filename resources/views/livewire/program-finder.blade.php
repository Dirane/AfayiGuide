<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Search -->
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Programs</label>
                <input wire:model="search" type="text" id="search" 
                       class="input-field" placeholder="Search by name, institution, field...">
            </div>

            <!-- Field of Study -->
            <div>
                <label for="field" class="block text-sm font-medium text-gray-700 mb-2">Field of Study</label>
                <select wire:model="field" id="field" class="input-field">
                    <option value="">All Fields</option>
                    @foreach($fields as $fieldOption)
                        <option value="{{ $fieldOption }}">{{ $fieldOption }}</option>
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

            <!-- Level -->
            <div>
                <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                <select wire:model="level" id="level" class="input-field">
                    <option value="">All Levels</option>
                    @foreach($levels as $levelOption)
                        <option value="{{ $levelOption }}">{{ $levelOption }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Budget Range -->
            <div>
                <label for="minBudget" class="block text-sm font-medium text-gray-700 mb-2">Min Budget (XAF)</label>
                <input wire:model="minBudget" type="number" id="minBudget" 
                       class="input-field" placeholder="0">
            </div>

            <div>
                <label for="maxBudget" class="block text-sm font-medium text-gray-700 mb-2">Max Budget (XAF)</label>
                <input wire:model="maxBudget" type="number" id="maxBudget" 
                       class="input-field" placeholder="1000000">
            </div>
        </div>

        <!-- Clear Filters Button -->
        <div class="mt-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-700">Sort by:</span>
                <button wire:click="sortBy('name')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'name' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Name
                </button>
                <button wire:click="sortBy('tuition_fee')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'tuition_fee' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Price
                </button>
                <button wire:click="sortBy('duration_months')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'duration_months' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Duration
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
            Found {{ $programs->total() }} program{{ $programs->total() !== 1 ? 's' : '' }}
        </p>
    </div>

    <!-- Programs Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($programs as $program)
            <div class="card hover:shadow-xl transition-shadow duration-300">
                <!-- Program Image Placeholder -->
                <div class="bg-gradient-to-br from-primary to-primary-800 h-48 rounded-t-lg flex items-center justify-center">
                    <div class="text-white text-center">
                        <div class="text-4xl mb-2">🎓</div>
                        <div class="text-sm opacity-90">{{ $program->institution }}</div>
                    </div>
                </div>

                <!-- Program Details -->
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $program->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($program->description, 120) }}</p>
                    
                    <!-- Program Info -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Institution:</span>
                            <span>{{ $program->institution }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Location:</span>
                            <span>{{ $program->location }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Field:</span>
                            <span>{{ $program->field_of_study }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Level:</span>
                            <span>{{ $program->level }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Duration:</span>
                            <span>{{ $program->duration_months }} months</span>
                        </div>
                        @if($program->tuition_fee)
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Tuition:</span>
                                <span class="font-semibold text-accent">{{ number_format($program->tuition_fee) }} {{ $program->currency }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <a href="{{ route('programs.show', $program) }}" class="btn-primary flex-1 text-center">
                            View Details
                        </a>
                        @if($program->website)
                            <a href="{{ $program->website }}" target="_blank" class="btn-outline">
                                Website
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No programs found</h3>
                <p class="text-gray-600 mb-4">Try adjusting your search criteria or filters.</p>
                <button wire:click="clearFilters" class="btn-primary">
                    Clear Filters
                </button>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($programs->hasPages())
        <div class="mt-8">
            {{ $programs->links() }}
        </div>
    @endif
</div>
