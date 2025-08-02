@extends('layouts.app')

@section('title', 'Your Personalized Pathway Report - PathFinder')
@section('description', 'Your personalized pathway report with recommendations.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Results -->
        <div class="card">
            <div class="text-center mb-8">
                <div class="text-6xl mb-4">🎉</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Your Personalized Pathway Report</h2>
                <p class="text-gray-600">Based on your responses, we've generated a comprehensive report with recommendations.</p>
            </div>

            @if($pathfinderResponse)
                <!-- Report Content -->
                <div class="prose max-w-none">
                    {!! nl2br(e($pathfinderResponse->pathway_report)) !!}
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="{{ route('pathfinder.download', $pathfinderResponse->id) }}" class="btn-primary text-center">
                        Download PDF Report
                    </a>
                    <a href="{{ route('programs.index') }}" class="btn-outline text-center">
                        Explore Programs
                    </a>
                    <a href="{{ route('opportunities.index') }}" class="btn-outline text-center">
                        View Opportunities
                    </a>
                    <a href="{{ route('pathfinder.reset') }}" class="btn-outline text-center">
                        Start Over
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 