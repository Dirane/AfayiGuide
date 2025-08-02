@extends('layouts.app')

@section('title', 'Step 4: Preferences - PathFinder')
@section('description', 'Tell us about your preferences.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-900">PathFinder - Your Journey to Success</h2>
                <span class="text-sm text-gray-600">Step 4 of 5</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-accent h-2 rounded-full transition-all duration-300" style="width: 80%"></div>
            </div>
        </div>

        <!-- Step 4 Form -->
        <div class="card">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Preferences (Optional)</h3>
            
            <form action="{{ route('pathfinder.step5.post') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="preferred_location" class="block text-sm font-medium text-gray-700 mb-2">
                        Preferred Location
                    </label>
                    <input type="text" name="preferred_location" id="preferred_location" 
                           class="input-field" placeholder="e.g., Yaoundé, Douala, Abroad...">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="budget_range_min" class="block text-sm font-medium text-gray-700 mb-2">
                            Minimum Budget (XAF)
                        </label>
                        <input type="number" name="budget_range_min" id="budget_range_min" 
                               class="input-field" placeholder="0">
                    </div>

                    <div>
                        <label for="budget_range_max" class="block text-sm font-medium text-gray-700 mb-2">
                            Maximum Budget (XAF)
                        </label>
                        <input type="number" name="budget_range_max" id="budget_range_max" 
                               class="input-field" placeholder="1000000">
                    </div>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('pathfinder.step3') }}" class="btn-outline">
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