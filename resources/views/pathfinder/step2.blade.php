@extends('layouts.app')

@section('title', 'PathFinder Step 2')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            @include('pathfinder.partials.progress', ['currentStep' => 2])
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Step 2: Your Career Goals</h1>
                <p class="text-lg text-gray-600">Tell us about your career goals and future aspirations</p>
            </div>

            <form method="POST" action="{{ route('pathfinder.step3') }}" class="space-y-6">
                @csrf

                <!-- Career Goals -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Career Goals (Select all that apply) *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="research" class="mr-3" {{ in_array('research', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Research & Development</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="healthcare" class="mr-3" {{ in_array('healthcare', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Healthcare & Medicine</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="business" class="mr-3" {{ in_array('business', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Business & Entrepreneurship</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="technology" class="mr-3" {{ in_array('technology', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Technology & IT</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="education" class="mr-3" {{ in_array('education', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Education & Teaching</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="government" class="mr-3" {{ in_array('government', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Government & Public Service</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="arts" class="mr-3" {{ in_array('arts', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Arts & Creative Industries</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="engineering" class="mr-3" {{ in_array('engineering', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Engineering & Construction</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="law" class="mr-3" {{ in_array('law', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Law & Legal Services</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="agriculture" class="mr-3" {{ in_array('agriculture', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Agriculture & Environment</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="career_goals[]" value="other" class="mr-3" {{ in_array('other', old('career_goals', [])) ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                    @error('career_goals')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other Career Goals (conditional) -->
                <div id="other_career_goals_div" class="hidden">
                    <label for="other_career_goals" class="block text-sm font-medium text-gray-700 mb-2">
                        Please specify other career goals
                    </label>
                    <textarea 
                        id="other_career_goals" 
                        name="other_career_goals" 
                        rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Please specify your other career goals..."
                    >{{ old('other_career_goals') }}</textarea>
                </div>

                <!-- Work Environment Preference -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Preferred Work Environment *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="work_environment" value="office" class="mr-3" {{ old('work_environment') == 'office' ? 'checked' : '' }} required>
                            <span>Office/Corporate</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="work_environment" value="remote" class="mr-3" {{ old('work_environment') == 'remote' ? 'checked' : '' }}>
                            <span>Remote/Flexible</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="work_environment" value="field" class="mr-3" {{ old('work_environment') == 'field' ? 'checked' : '' }}>
                            <span>Field/Outdoor</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="work_environment" value="laboratory" class="mr-3" {{ old('work_environment') == 'laboratory' ? 'checked' : '' }}>
                            <span>Laboratory/Research</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="work_environment" value="classroom" class="mr-3" {{ old('work_environment') == 'classroom' ? 'checked' : '' }}>
                            <span>Classroom/Educational</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="work_environment" value="healthcare" class="mr-3" {{ old('work_environment') == 'healthcare' ? 'checked' : '' }}>
                            <span>Healthcare/Clinical</span>
                        </label>
                    </div>
                    @error('work_environment')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between pt-6">
                    <a href="{{ route('pathfinder.step1') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
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
    // Career goals other field
    const otherCareerGoalsCheckbox = document.querySelector('input[name="career_goals[]"][value="other"]');
    const otherCareerGoalsDiv = document.getElementById('other_career_goals_div');
    const otherCareerGoalsTextarea = document.getElementById('other_career_goals');

    otherCareerGoalsCheckbox.addEventListener('change', function() {
        if (this.checked) {
            otherCareerGoalsDiv.classList.remove('hidden');
            otherCareerGoalsTextarea.required = true;
        } else {
            otherCareerGoalsDiv.classList.add('hidden');
            otherCareerGoalsTextarea.required = false;
            otherCareerGoalsTextarea.value = '';
        }
    });

    // Check on page load if "other" was previously selected
    if (otherCareerGoalsCheckbox.checked) {
        otherCareerGoalsDiv.classList.remove('hidden');
        otherCareerGoalsTextarea.required = true;
    }
});
</script>
@endsection 