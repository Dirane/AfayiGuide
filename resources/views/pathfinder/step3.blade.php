@extends('layouts.app')

@section('title', 'PathFinder Step 3')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Step 3: Your Skills & Languages</h1>
                <p class="text-lg text-gray-600">Tell us about your key skills and languages</p>
            </div>

            <form method="POST" action="{{ route('pathfinder.step4') }}" class="space-y-6">
                @csrf

                <!-- Key Skills -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Key Skills (Select all that apply)
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="leadership" class="mr-3" {{ in_array('leadership', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Leadership</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="communication" class="mr-3" {{ in_array('communication', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Communication</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="problem_solving" class="mr-3" {{ in_array('problem_solving', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Problem Solving</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="creativity" class="mr-3" {{ in_array('creativity', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Creativity</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="research" class="mr-3" {{ in_array('research', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Research</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="technical" class="mr-3" {{ in_array('technical', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Technical</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="analytical" class="mr-3" {{ in_array('analytical', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Analytical</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="key_skills[]" value="teamwork" class="mr-3" {{ in_array('teamwork', old('key_skills', [])) ? 'checked' : '' }}>
                            <span>Teamwork</span>
                        </label>
                    </div>
                </div>

                <!-- Languages -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Languages (Select all that apply)
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="languages[]" value="english" class="mr-3" {{ in_array('english', old('languages', [])) ? 'checked' : '' }}>
                            <span>English</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="languages[]" value="french" class="mr-3" {{ in_array('french', old('languages', [])) ? 'checked' : '' }}>
                            <span>French</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="languages[]" value="other" class="mr-3" {{ in_array('other', old('languages', [])) ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                </div>

                <!-- Other Languages (conditional) -->
                <div id="other_languages_div" class="hidden">
                    <label for="other_languages" class="block text-sm font-medium text-gray-700 mb-2">
                        Please specify other languages
                    </label>
                    <textarea 
                        id="other_languages" 
                        name="other_languages" 
                        rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Please specify other languages you speak..."
                    >{{ old('other_languages') }}</textarea>
                </div>

                <div class="flex justify-between pt-6">
                    <a href="{{ route('pathfinder.step2') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
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
    // Languages other field
    const otherLanguagesCheckbox = document.querySelector('input[name="languages[]"][value="other"]');
    const otherLanguagesDiv = document.getElementById('other_languages_div');
    const otherLanguagesTextarea = document.getElementById('other_languages');

    otherLanguagesCheckbox.addEventListener('change', function() {
        if (this.checked) {
            otherLanguagesDiv.classList.remove('hidden');
            otherLanguagesTextarea.required = true;
        } else {
            otherLanguagesDiv.classList.add('hidden');
            otherLanguagesTextarea.required = false;
            otherLanguagesTextarea.value = '';
        }
    });

    // Check on page load if "other" was previously selected
    if (otherLanguagesCheckbox.checked) {
        otherLanguagesDiv.classList.remove('hidden');
        otherLanguagesTextarea.required = true;
    }
});
</script>
@endsection 