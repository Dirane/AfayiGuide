@extends('layouts.app')

@section('title', 'Step 3: Skills & Interests - PathFinder')
@section('description', 'Tell us about your skills and interests.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">PathFinder - Your Journey to Success</h2>
                <span class="text-sm text-gray-600">Step 3 of 5</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-accent h-2 rounded-full transition-all duration-300" style="width: 60%"></div>
            </div>
        </div>

        <!-- Step 3 Form -->
        <div class="card">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Skills & Interests (Optional)</h3>
            
            <form action="{{ route('pathfinder.step4.post') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        What skills do you have? (Optional)
                    </label>
                    <p class="text-sm text-gray-600 mb-4">You can skip this step if you prefer.</p>
                    <button type="submit" class="btn-primary">
                        Skip & Continue
                    </button>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('pathfinder.step2') }}" class="btn-outline">
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