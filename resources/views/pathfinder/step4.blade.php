@extends('layouts.app')

@section('title', 'PathFinder Step 4')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            @include('pathfinder.partials.progress', ['currentStep' => 4])
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Step 4: Your Preferences</h1>
                <p class="text-lg text-gray-600">Tell us about your location and study preferences</p>
            </div>

            <form method="POST" action="{{ route('pathfinder.step5') }}" class="space-y-6">
                @csrf

                <!-- Preferred Location -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Preferred Locations (Select all that apply) *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_locations[]" value="yaounde" class="mr-3" {{ in_array('yaounde', old('preferred_locations', [])) ? 'checked' : '' }}>
                            <span>Yaoundé</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_locations[]" value="douala" class="mr-3" {{ in_array('douala', old('preferred_locations', [])) ? 'checked' : '' }}>
                            <span>Douala</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_locations[]" value="bamenda" class="mr-3" {{ in_array('bamenda', old('preferred_locations', [])) ? 'checked' : '' }}>
                            <span>Bamenda</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_locations[]" value="buea" class="mr-3" {{ in_array('buea', old('preferred_locations', [])) ? 'checked' : '' }}>
                            <span>Buea</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_locations[]" value="abroad" class="mr-3" {{ in_array('abroad', old('preferred_locations', [])) ? 'checked' : '' }}>
                            <span>Abroad</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="preferred_locations[]" value="other" class="mr-3" {{ in_array('other', old('preferred_locations', [])) ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                    @error('preferred_locations')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other Location (conditional) -->
                <div id="other_location_div" class="hidden">
                    <label for="other_location" class="block text-sm font-medium text-gray-700 mb-2">
                        Please specify other location
                    </label>
                    <textarea 
                        id="other_location" 
                        name="other_location" 
                        rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Please specify your preferred location..."
                    >{{ old('other_location') }}</textarea>
                </div>

                <!-- Study Mode Preference -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Study Mode Preference *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="study_mode" value="full_time" class="mr-3" {{ old('study_mode') == 'full_time' ? 'checked' : '' }} required>
                            <span>Full-time</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="study_mode" value="part_time" class="mr-3" {{ old('study_mode') == 'part_time' ? 'checked' : '' }}>
                            <span>Part-time</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="study_mode" value="distance" class="mr-3" {{ old('study_mode') == 'distance' ? 'checked' : '' }}>
                            <span>Distance Learning</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="study_mode" value="flexible" class="mr-3" {{ old('study_mode') == 'flexible' ? 'checked' : '' }}>
                            <span>Flexible</span>
                        </label>
                    </div>
                    @error('study_mode')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between pt-6">
                    <a href="{{ route('pathfinder.step3') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        ← Back
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        Next Step →
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const otherLocationCheckbox = document.querySelector('input[name="preferred_locations[]"][value="other"]');
    const otherLocationDiv = document.getElementById('other_location_div');
    const otherLocationTextarea = document.getElementById('other_location');

    otherLocationCheckbox.addEventListener('change', function() {
        if (this.checked) {
            otherLocationDiv.classList.remove('hidden');
            otherLocationTextarea.required = true;
        } else {
            otherLocationDiv.classList.add('hidden');
            otherLocationTextarea.required = false;
            otherLocationTextarea.value = '';
        }
    });

    // Check on page load if "other" was previously selected
    if (otherLocationCheckbox.checked) {
        otherLocationDiv.classList.remove('hidden');
        otherLocationTextarea.required = true;
    }
});
</script>
@endsection 