<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Search -->
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Mentors</label>
                <input wire:model="search" type="text" id="search" 
                       class="input-field" placeholder="Search by name, expertise, bio...">
            </div>

            <!-- Expertise -->
            <div>
                <label for="expertise" class="block text-sm font-medium text-gray-700 mb-2">Expertise</label>
                <select wire:model="expertise" id="expertise" class="input-field">
                    <option value="">All Expertise</option>
                    @foreach($expertiseOptions as $expertiseOption)
                        <option value="{{ $expertiseOption }}">{{ $expertiseOption }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <select wire:model="location" id="location" class="input-field">
                    <option value="">All Locations</option>
                    @foreach($locationOptions as $locationOption)
                        <option value="{{ $locationOption }}">{{ $locationOption }}</option>
                    @endforeach
                </select>
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
                <button wire:click="sortBy('expertise')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'expertise' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Expertise
                </button>
                <button wire:click="sortBy('rating')" 
                        class="text-sm px-3 py-1 rounded {{ $sortBy === 'rating' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' }}">
                    Rating
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
            Found {{ $mentors->total() }} mentor{{ $mentors->total() !== 1 ? 's' : '' }}
        </p>
    </div>

    <!-- Mentors Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($mentors as $mentor)
            <div class="card hover:shadow-xl transition-shadow duration-300">
                <!-- Mentor Header -->
                <div class="bg-gradient-to-br from-primary to-primary-800 h-48 rounded-t-lg flex items-center justify-center relative">
                    <div class="text-white text-center">
                        <div class="text-4xl mb-2">👨‍🏫</div>
                        <div class="text-sm opacity-90">{{ $mentor->expertise ?? 'General Guidance' }}</div>
                    </div>
                    
                    <!-- Rating Badge -->
                    @if($mentor->rating)
                        <div class="absolute top-4 right-4">
                            <span class="bg-yellow-400 text-yellow-900 px-2 py-1 rounded-full text-xs font-medium">
                                ⭐ {{ number_format($mentor->rating, 1) }}
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Mentor Details -->
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $mentor->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($mentor->bio ?? 'Experienced mentor providing guidance and support.', 120) }}</p>
                    
                    <!-- Mentor Info -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium w-20">Expertise:</span>
                            <span>{{ $mentor->expertise ?? 'General' }}</span>
                        </div>
                        @if($mentor->location)
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Location:</span>
                                <span>{{ $mentor->location }}</span>
                            </div>
                        @endif
                        @if($mentor->experience_years)
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Experience:</span>
                                <span>{{ $mentor->experience_years }} years</span>
                            </div>
                        @endif
                        @if($mentor->hourly_rate)
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="font-medium w-20">Rate:</span>
                                <span class="font-semibold text-accent">{{ number_format($mentor->hourly_rate) }} XAF/hour</span>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <button wire:click="selectMentor({{ $mentor->id }})" class="btn-primary flex-1">
                            Book Session
                        </button>
                        @if($mentor->email)
                            <a href="mailto:{{ $mentor->email }}" class="btn-outline">
                                Contact
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">👥</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No mentors found</h3>
                <p class="text-gray-600 mb-4">Try adjusting your search criteria or filters.</p>
                <button wire:click="clearFilters" class="btn-primary">
                    Clear Filters
                </button>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($mentors->hasPages())
        <div class="mt-8">
            {{ $mentors->links() }}
        </div>
    @endif

    <!-- Booking Modal -->
    @if($showBookingModal && $selectedMentor)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Book Session with {{ $selectedMentor->name }}</h3>
                        <button wire:click="closeBookingModal" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="bookSession">
                        <div class="space-y-4">
                            <!-- Date -->
                            <div>
                                <label for="bookingDate" class="block text-sm font-medium text-gray-700 mb-2">Session Date</label>
                                <input wire:model="bookingDate" type="date" id="bookingDate" 
                                       class="input-field" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                @error('bookingDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Time -->
                            <div>
                                <label for="bookingTime" class="block text-sm font-medium text-gray-700 mb-2">Session Time</label>
                                <select wire:model="bookingTime" id="bookingTime" class="input-field">
                                    <option value="">Select a time</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                </select>
                                @error('bookingTime') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Session Type -->
                            <div>
                                <label for="sessionType" class="block text-sm font-medium text-gray-700 mb-2">Session Type</label>
                                <select wire:model="sessionType" id="sessionType" class="input-field">
                                    <option value="video">Video Call</option>
                                    <option value="audio">Audio Call</option>
                                    <option value="chat">Chat/Text</option>
                                </select>
                                @error('sessionType') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Notes -->
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                                <textarea wire:model="notes" id="notes" rows="3" 
                                          class="input-field" placeholder="Any specific topics or questions you'd like to discuss..."></textarea>
                                @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex space-x-3 mt-6">
                            <button type="submit" class="btn-primary flex-1">
                                Book Session
                            </button>
                            <button type="button" wire:click="closeBookingModal" class="btn-outline flex-1">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div> 