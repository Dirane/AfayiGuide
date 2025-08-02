@extends('layouts.app')

@section('title', 'Step 1: Academic Background - PathFinder')
@section('description', 'Tell us about your academic background and field of interest.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">PathFinder - Your Journey to Success</h2>
                <span class="text-sm text-gray-600">Step 1 of 5</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-accent h-2 rounded-full transition-all duration-300" style="width: 20%"></div>
            </div>
        </div>

        <!-- Step 1 Form -->
        <div class="card">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Academic Background</h3>
            
            <form action="{{ route('pathfinder.step2.post') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="academic_background" class="block text-sm font-medium text-gray-700 mb-2">
                        What is your academic background? *
                    </label>
                    <select name="academic_background" id="academic_background" class="input-field" required>
                        <option value="">Select your background</option>
                        <option value="GCE A-Level" {{ old('academic_background') == 'GCE A-Level' ? 'selected' : '' }}>GCE A-Level</option>
                        <option value="HND" {{ old('academic_background') == 'HND' ? 'selected' : '' }}>HND (Higher National Diploma)</option>
                        <option value="BTS" {{ old('academic_background') == 'BTS' ? 'selected' : '' }}>BTS (Brevet de Technicien Supérieur)</option>
                        <option value="DUT" {{ old('academic_background') == 'DUT' ? 'selected' : '' }}>DUT (Diplôme Universitaire de Technologie)</option>
                        <option value="Other" {{ old('academic_background') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('academic_background') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="field_of_interest" class="block text-sm font-medium text-gray-700 mb-2">
                        What field of study interests you most? *
                    </label>
                    <select name="field_of_interest" id="field_of_interest" class="input-field" required>
                        <option value="">Select your field of interest</option>
                        <option value="Computer Science" {{ old('field_of_interest') == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                        <option value="Engineering" {{ old('field_of_interest') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                        <option value="Business Administration" {{ old('field_of_interest') == 'Business Administration' ? 'selected' : '' }}>Business Administration</option>
                        <option value="Medicine" {{ old('field_of_interest') == 'Medicine' ? 'selected' : '' }}>Medicine</option>
                        <option value="Law" {{ old('field_of_interest') == 'Law' ? 'selected' : '' }}>Law</option>
                        <option value="Arts and Humanities" {{ old('field_of_interest') == 'Arts and Humanities' ? 'selected' : '' }}>Arts and Humanities</option>
                        <option value="Social Sciences" {{ old('field_of_interest') == 'Social Sciences' ? 'selected' : '' }}>Social Sciences</option>
                        <option value="Natural Sciences" {{ old('field_of_interest') == 'Natural Sciences' ? 'selected' : '' }}>Natural Sciences</option>
                        <option value="Education" {{ old('field_of_interest') == 'Education' ? 'selected' : '' }}>Education</option>
                        <option value="Agriculture" {{ old('field_of_interest') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                        <option value="Other" {{ old('field_of_interest') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('field_of_interest') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Navigation -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('pathfinder.reset') }}" class="btn-outline text-red-600 hover:text-red-700">
                        Reset Form
                    </a>
                    <button type="submit" class="btn-primary">
                        Next Step
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 