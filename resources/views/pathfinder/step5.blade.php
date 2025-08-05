@extends('layouts.app')

@section('title', 'PathFinder Step 5')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Step 5: Final Preferences</h1>
                <p class="text-lg text-gray-600">Final preferences and generate your personalized report</p>
            </div>

            <form method="POST" action="{{ route('pathfinder.generate') }}" class="space-y-6">
                @csrf

                <!-- Program Duration Preference -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Preferred Program Duration *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_duration" value="short" class="mr-3" {{ old('program_duration') == 'short' ? 'checked' : '' }} required>
                            <span>Short (1-2 years)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_duration" value="medium" class="mr-3" {{ old('program_duration') == 'medium' ? 'checked' : '' }}>
                            <span>Medium (3-4 years)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_duration" value="long" class="mr-3" {{ old('program_duration') == 'long' ? 'checked' : '' }}>
                            <span>Long (5+ years)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_duration" value="flexible" class="mr-3" {{ old('program_duration') == 'flexible' ? 'checked' : '' }}>
                            <span>Flexible</span>
                        </label>
                    </div>
                    @error('program_duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Program Level Preference -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Preferred Program Level *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_level" value="certificate" class="mr-3" {{ old('program_level') == 'certificate' ? 'checked' : '' }} required>
                            <span>Certificate</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_level" value="diploma" class="mr-3" {{ old('program_level') == 'diploma' ? 'checked' : '' }}>
                            <span>Diploma</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_level" value="bachelor" class="mr-3" {{ old('program_level') == 'bachelor' ? 'checked' : '' }}>
                            <span>Bachelor's Degree</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_level" value="master" class="mr-3" {{ old('program_level') == 'master' ? 'checked' : '' }}>
                            <span>Master's Degree</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_level" value="phd" class="mr-3" {{ old('program_level') == 'phd' ? 'checked' : '' }}>
                            <span>PhD/Doctorate</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="program_level" value="flexible" class="mr-3" {{ old('program_level') == 'flexible' ? 'checked' : '' }}>
                            <span>Flexible</span>
                        </label>
                    </div>
                    @error('program_level')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Preferences -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Additional Preferences (Select all that apply)
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="additional_preferences[]" value="internship" class="mr-3" {{ in_array('internship', old('additional_preferences', [])) ? 'checked' : '' }}>
                            <span>Internship Opportunities</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="additional_preferences[]" value="research" class="mr-3" {{ in_array('research', old('additional_preferences', [])) ? 'checked' : '' }}>
                            <span>Research Opportunities</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="additional_preferences[]" value="international" class="mr-3" {{ in_array('international', old('additional_preferences', [])) ? 'checked' : '' }}>
                            <span>International Exchange</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="additional_preferences[]" value="scholarship" class="mr-3" {{ in_array('scholarship', old('additional_preferences', [])) ? 'checked' : '' }}>
                            <span>Scholarship Opportunities</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="additional_preferences[]" value="career_services" class="mr-3" {{ in_array('career_services', old('additional_preferences', [])) ? 'checked' : '' }}>
                            <span>Career Services</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="additional_preferences[]" value="none" class="mr-3" {{ in_array('none', old('additional_preferences', [])) ? 'checked' : '' }}>
                            <span>None specific</span>
                        </label>
                    </div>
                </div>

                <!-- Additional Notes -->
                <div>
                    <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-2">
                        Additional Notes (Optional)
                    </label>
                    <textarea 
                        id="additional_notes" 
                        name="additional_notes" 
                        rows="3" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Any additional information you'd like us to consider for your personalized recommendations..."
                    >{{ old('additional_notes') }}</textarea>
                    @error('additional_notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Ready to Generate Your Report</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <p>Based on your responses, we'll create a personalized report with:</p>
                                <ul class="list-disc list-inside mt-1">
                                    <li>Recommended schools and programs</li>
                                    <li>Career pathway suggestions</li>
                                    <li>Application guidance</li>
                                    <li>Next steps for your journey</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between pt-6">
                    <a href="{{ route('pathfinder.step4') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        ← Back
                    </a>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                        Generate Report →
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 