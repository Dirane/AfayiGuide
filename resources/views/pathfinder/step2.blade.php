@extends('layouts.app')

@section('title', 'Step 2: Career Goals - PathFinder')
@section('description', 'Tell us about your career goals and aspirations.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">PathFinder - Your Journey to Success</h2>
                <span class="text-sm text-gray-600">Step 2 of 5</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-accent h-2 rounded-full transition-all duration-300" style="width: 40%"></div>
            </div>
        </div>

        <!-- Step 2 Form -->
        <div class="card">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Career Goals & Aspirations</h3>
            
            <form action="{{ route('pathfinder.step3.post') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="career_goals" class="block text-sm font-medium text-gray-700 mb-2">
                        What are your career goals? *
                    </label>
                    <textarea name="career_goals" id="career_goals" rows="4" 
                              class="input-field" placeholder="Describe your career aspirations and what you hope to achieve..." required>{{ old('career_goals') }}</textarea>
                    @error('career_goals') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="aspirations" class="block text-sm font-medium text-gray-700 mb-2">
                        What are your personal aspirations? *
                    </label>
                    <textarea name="aspirations" id="aspirations" rows="4" 
                              class="input-field" placeholder="Share your dreams, values, and what drives you..." required>{{ old('aspirations') }}</textarea>
                    @error('aspirations') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Navigation -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('pathfinder.step1') }}" class="btn-outline">
                        Previous
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