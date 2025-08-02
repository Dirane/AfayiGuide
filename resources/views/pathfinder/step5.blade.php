@extends('layouts.app')

@section('title', 'Step 5: Additional Information - PathFinder')
@section('description', 'Final step - additional information and generate report.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">PathFinder - Your Journey to Success</h2>
                <span class="text-sm text-gray-600">Step 5 of 5</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-accent h-2 rounded-full transition-all duration-300" style="width: 100%"></div>
            </div>
        </div>

        <!-- Step 5 Form -->
        <div class="card">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Additional Information (Optional)</h3>
            
            <form action="{{ route('pathfinder.generate') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-2">
                        Any additional information you'd like to share?
                    </label>
                    <textarea name="additional_notes" id="additional_notes" rows="4" 
                              class="input-field" placeholder="Share any other relevant information..."></textarea>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('pathfinder.step4') }}" class="btn-outline">
                        Previous
                    </a>
                    <button type="submit" class="btn-primary">
                        Generate Report
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 