@extends('layouts.app')

@section('title', 'PathFinder Step 1')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Step 1: Your Academic Profile</h1>
                <p class="text-lg text-gray-600">Tell us about your current academic status and interests</p>
            </div>

            <form method="POST" action="{{ route('pathfinder.step2') }}" class="space-y-6">
                @csrf

                <!-- Current Academic Level -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Your Current Academic Level *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="academic_level" value="advanced_level" class="mr-3" {{ old('academic_level') == 'advanced_level' ? 'checked' : '' }} required>
                            <span>Advanced Level Holder</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="academic_level" value="hnd" class="mr-3" {{ old('academic_level') == 'hnd' ? 'checked' : '' }}>
                            <span>HND Holder</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="academic_level" value="degree" class="mr-3" {{ old('academic_level') == 'degree' ? 'checked' : '' }}>
                            <span>Degree Holder</span>
                        </label>
                    </div>
                    @error('academic_level')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Self Academic Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        How do you rate yourself academically? *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="self_academic_rating" value="excellent" class="mr-3" {{ old('self_academic_rating') == 'excellent' ? 'checked' : '' }} required>
                            <span>Excellent (8-10/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="self_academic_rating" value="very_good" class="mr-3" {{ old('self_academic_rating') == 'very_good' ? 'checked' : '' }}>
                            <span>Very Good (7-8/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="self_academic_rating" value="good" class="mr-3" {{ old('self_academic_rating') == 'good' ? 'checked' : '' }}>
                            <span>Good (6-7/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="self_academic_rating" value="average" class="mr-3" {{ old('self_academic_rating') == 'average' ? 'checked' : '' }}>
                            <span>Average (5-6/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="self_academic_rating" value="below_average" class="mr-3" {{ old('self_academic_rating') == 'below_average' ? 'checked' : '' }}>
                            <span>Below Average (4-5/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="self_academic_rating" value="other" class="mr-3" {{ old('self_academic_rating') == 'other' ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                    @error('self_academic_rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other Self Rating (conditional) -->
                <div id="other_self_rating_div" class="hidden">
                    <label for="other_self_rating" class="block text-sm font-medium text-gray-700 mb-2">
                        Please specify your academic self-rating
                    </label>
                    <textarea 
                        id="other_self_rating" 
                        name="other_self_rating" 
                        rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Please describe your academic self-rating..."
                    >{{ old('other_self_rating') }}</textarea>
                </div>

                <!-- Peer/Teacher Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        How do your teachers and peers rate you academically? *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="peer_teacher_rating" value="excellent" class="mr-3" {{ old('peer_teacher_rating') == 'excellent' ? 'checked' : '' }} required>
                            <span>Excellent (8-10/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="peer_teacher_rating" value="very_good" class="mr-3" {{ old('peer_teacher_rating') == 'very_good' ? 'checked' : '' }}>
                            <span>Very Good (7-8/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="peer_teacher_rating" value="good" class="mr-3" {{ old('peer_teacher_rating') == 'good' ? 'checked' : '' }}>
                            <span>Good (6-7/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="peer_teacher_rating" value="average" class="mr-3" {{ old('peer_teacher_rating') == 'average' ? 'checked' : '' }}>
                            <span>Average (5-6/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="peer_teacher_rating" value="below_average" class="mr-3" {{ old('peer_teacher_rating') == 'below_average' ? 'checked' : '' }}>
                            <span>Below Average (4-5/10)</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="peer_teacher_rating" value="other" class="mr-3" {{ old('peer_teacher_rating') == 'other' ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                    @error('peer_teacher_rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other Peer/Teacher Rating (conditional) -->
                <div id="other_peer_rating_div" class="hidden">
                    <label for="other_peer_rating" class="block text-sm font-medium text-gray-700 mb-2">
                        Please specify how teachers and peers rate you
                    </label>
                    <textarea 
                        id="other_peer_rating" 
                        name="other_peer_rating" 
                        rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Please describe how teachers and peers rate you academically..."
                    >{{ old('other_peer_rating') }}</textarea>
                </div>

                <!-- Fields of Interest -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Fields of Interest (Select all that apply) *
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="science" class="mr-3" {{ in_array('science', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Science & Technology</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="medicine" class="mr-3" {{ in_array('medicine', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Medicine & Health</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="business" class="mr-3" {{ in_array('business', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Business & Economics</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="arts" class="mr-3" {{ in_array('arts', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Arts & Humanities</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="engineering" class="mr-3" {{ in_array('engineering', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Engineering</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="law" class="mr-3" {{ in_array('law', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Law & Politics</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="education" class="mr-3" {{ in_array('education', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Education</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="agriculture" class="mr-3" {{ in_array('agriculture', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Agriculture</span>
                        </label>
                        <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="fields_of_interest[]" value="other" class="mr-3" {{ in_array('other', old('fields_of_interest', [])) ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                    @error('fields_of_interest')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Other Fields (conditional) -->
                <div id="other_fields_div" class="hidden">
                    <label for="other_fields" class="block text-sm font-medium text-gray-700 mb-2">
                        Please specify other fields of interest
                    </label>
                    <textarea 
                        id="other_fields" 
                        name="other_fields" 
                        rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Please specify your other fields of interest..."
                    >{{ old('other_fields') }}</textarea>
                </div>

                <div class="flex justify-between pt-6">
                    <a href="{{ route('pathfinder.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Back
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
    // Fields of interest other field
    const otherCheckbox = document.querySelector('input[name="fields_of_interest[]"][value="other"]');
    const otherFieldsDiv = document.getElementById('other_fields_div');
    const otherFieldsTextarea = document.getElementById('other_fields');

    otherCheckbox.addEventListener('change', function() {
        if (this.checked) {
            otherFieldsDiv.classList.remove('hidden');
            otherFieldsTextarea.required = true;
        } else {
            otherFieldsDiv.classList.add('hidden');
            otherFieldsTextarea.required = false;
            otherFieldsTextarea.value = '';
        }
    });

    // Self academic rating other field
    const otherSelfRatingRadio = document.querySelector('input[name="self_academic_rating"][value="other"]');
    const otherSelfRatingDiv = document.getElementById('other_self_rating_div');
    const otherSelfRatingTextarea = document.getElementById('other_self_rating');

    otherSelfRatingRadio.addEventListener('change', function() {
        if (this.checked) {
            otherSelfRatingDiv.classList.remove('hidden');
            otherSelfRatingTextarea.required = true;
        } else {
            otherSelfRatingDiv.classList.add('hidden');
            otherSelfRatingTextarea.required = false;
            otherSelfRatingTextarea.value = '';
        }
    });

    // Peer/Teacher rating other field
    const otherPeerRatingRadio = document.querySelector('input[name="peer_teacher_rating"][value="other"]');
    const otherPeerRatingDiv = document.getElementById('other_peer_rating_div');
    const otherPeerRatingTextarea = document.getElementById('other_peer_rating');

    otherPeerRatingRadio.addEventListener('change', function() {
        if (this.checked) {
            otherPeerRatingDiv.classList.remove('hidden');
            otherPeerRatingTextarea.required = true;
        } else {
            otherPeerRatingDiv.classList.add('hidden');
            otherPeerRatingTextarea.required = false;
            otherPeerRatingTextarea.value = '';
        }
    });

    // Check on page load if "other" was previously selected
    if (otherCheckbox.checked) {
        otherFieldsDiv.classList.remove('hidden');
        otherFieldsTextarea.required = true;
    }

    if (otherSelfRatingRadio.checked) {
        otherSelfRatingDiv.classList.remove('hidden');
        otherSelfRatingTextarea.required = true;
    }

    if (otherPeerRatingRadio.checked) {
        otherPeerRatingDiv.classList.remove('hidden');
        otherPeerRatingTextarea.required = true;
    }
});
</script>
@endsection
