<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if(!$showResults)
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">PathFinder - Your Journey to Success</h2>
                <span class="text-sm text-gray-600">Step {{ $currentStep }} of {{ $totalSteps }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-accent h-2 rounded-full transition-all duration-300" 
                     style="width: {{ ($currentStep / $totalSteps) * 100 }}%"></div>
            </div>
        </div>

        <!-- Flash Messages -->
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <p class="text-blue-800">{{ session('message') }}</p>
            </div>
        @endif

        <!-- Step Forms -->
        <div class="card">
            <!-- General Error Display -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h4 class="text-red-800 font-medium mb-2">Please fix the following errors:</h4>
                    <ul class="text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($currentStep === 1)
                <!-- Step 1: Academic Background -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Academic Background</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="academicBackground" class="block text-sm font-medium text-gray-700 mb-2">
                                What is your academic background? *
                            </label>
                            <select wire:model="academicBackground" id="academicBackground" class="input-field">
                                <option value="">Select your background</option>
                                <option value="GCE A-Level">GCE A-Level</option>
                                <option value="HND">HND (Higher National Diploma)</option>
                                <option value="BTS">BTS (Brevet de Technicien Supérieur)</option>
                                <option value="DUT">DUT (Diplôme Universitaire de Technologie)</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('academicBackground') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="fieldOfInterest" class="block text-sm font-medium text-gray-700 mb-2">
                                What field of study interests you most? *
                            </label>
                            <select wire:model="fieldOfInterest" id="fieldOfInterest" class="input-field">
                                <option value="">Select your field of interest</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Business Administration">Business Administration</option>
                                <option value="Medicine">Medicine</option>
                                <option value="Law">Law</option>
                                <option value="Arts and Humanities">Arts and Humanities</option>
                                <option value="Social Sciences">Social Sciences</option>
                                <option value="Natural Sciences">Natural Sciences</option>
                                <option value="Education">Education</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('fieldOfInterest') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

            @elseif($currentStep === 2)
                <!-- Step 2: Career Goals -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Career Goals & Aspirations</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="careerGoals" class="block text-sm font-medium text-gray-700 mb-2">
                                What are your career goals? *
                            </label>
                            <textarea wire:model="careerGoals" id="careerGoals" rows="4" 
                                      class="input-field" placeholder="Describe your career aspirations and what you hope to achieve..."></textarea>
                            @error('careerGoals') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="aspirations" class="block text-sm font-medium text-gray-700 mb-2">
                                What are your personal aspirations? *
                            </label>
                            <textarea wire:model="aspirations" id="aspirations" rows="4" 
                                      class="input-field" placeholder="Share your dreams, values, and what drives you..."></textarea>
                            @error('aspirations') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

            @elseif($currentStep === 3)
                <!-- Step 3: Skills & Interests -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Skills & Interests</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                What skills do you have? (Optional)
                            </label>
                            <div class="flex gap-2 mb-4">
                                <input wire:model="newSkill" type="text" class="input-field flex-1" 
                                       placeholder="Add a skill..." wire:keydown.enter="addSkill">
                                <button type="button" wire:click="addSkill" class="btn-accent">Add</button>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($skills as $index => $skill)
                                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm flex items-center gap-2">
                                        {{ $skill }}
                                        <button type="button" wire:click="removeSkill({{ $index }})" class="text-white hover:text-red-200">×</button>
                                    </span>
                                @endforeach
                            </div>

                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                What are your interests? (Optional)
                            </label>
                            <div class="flex gap-2 mb-4">
                                <input wire:model="newInterest" type="text" class="input-field flex-1" 
                                       placeholder="Add an interest..." wire:keydown.enter="addInterest">
                                <button type="button" wire:click="addInterest" class="btn-accent">Add</button>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($interests as $index => $interest)
                                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm flex items-center gap-2">
                                        {{ $interest }}
                                        <button type="button" wire:click="removeInterest({{ $index }})" class="text-white hover:text-red-200">×</button>
                                    </span>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            @elseif($currentStep === 4)
                <!-- Step 4: Preferences -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Preferences</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="preferredLocation" class="block text-sm font-medium text-gray-700 mb-2">
                                Preferred Location
                            </label>
                            <input wire:model="preferredLocation" type="text" id="preferredLocation" 
                                   class="input-field" placeholder="e.g., Yaoundé, Douala, Abroad...">
                            @error('preferredLocation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="budgetRangeMin" class="block text-sm font-medium text-gray-700 mb-2">
                                    Minimum Budget ({{ $currency }})
                                </label>
                                <input wire:model="budgetRangeMin" type="number" id="budgetRangeMin" 
                                       class="input-field" placeholder="0">
                                @error('budgetRangeMin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="budgetRangeMax" class="block text-sm font-medium text-gray-700 mb-2">
                                    Maximum Budget ({{ $currency }})
                                </label>
                                <input wire:model="budgetRangeMax" type="number" id="budgetRangeMax" 
                                       class="input-field" placeholder="1000000">
                                @error('budgetRangeMax') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

            @elseif($currentStep === 5)
                <!-- Step 5: Additional Information -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Additional Information</h3>
                    
                    <div>
                        <label for="additionalNotes" class="block text-sm font-medium text-gray-700 mb-2">
                            Any additional information you'd like to share?
                        </label>
                        <textarea wire:model="additionalNotes" id="additionalNotes" rows="4" 
                                  class="input-field" placeholder="Share any other relevant information..."></textarea>
                        @error('additionalNotes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-8">
                <div class="flex space-x-2">
                    @if($currentStep > 1)
                        <button wire:click="previousStep" class="btn-outline" type="button">
                            Previous
                        </button>
                    @endif
                    <button wire:click="forceNext" onclick="console.log('Force next clicked')" class="btn-outline text-yellow-600 hover:text-yellow-700" type="button">
                        Force Next
                    </button>
                </div>

                <div>
                    @if($currentStep < $totalSteps)
                        <button wire:click="nextStep" onclick="console.log('Next button clicked - step {{ $currentStep }}')" class="btn-primary" type="button">
                            Next
                        </button>
                    @else
                        <button wire:click="submitForm" onclick="console.log('Submit button clicked')" class="btn-primary" type="button">
                            Generate Report
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @else
        <!-- Results -->
        <div class="card">
            <div class="text-center mb-8">
                <div class="text-6xl mb-4">🎉</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Your Personalized Pathway Report</h2>
                <p class="text-gray-600">Based on your responses, we've generated a comprehensive report with recommendations.</p>
            </div>

            @if($pathfinderResponse)
                <!-- Report Content -->
                <div class="prose max-w-none">
                    {!! nl2br(e($pathfinderResponse->pathway_report)) !!}
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <button wire:click="downloadReport" class="btn-primary">
                        Download PDF Report
                    </button>
                    <a href="{{ route('programs.index') }}" class="btn-outline text-center">
                        Explore Programs
                    </a>
                    <a href="{{ route('opportunities.index') }}" class="btn-outline text-center">
                        View Opportunities
                    </a>
                </div>
            @endif
        </div>
    @endif
</div>
