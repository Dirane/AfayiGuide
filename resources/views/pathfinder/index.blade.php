@extends('layouts.app')

@section('title', 'PathFinder - Your Gateway to the Next Level')
@section('description', 'Discover your perfect educational path that will elevate you to the next level. Get personalized recommendations based on your background, goals, and aspirations.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center">
            <div class="text-6xl mb-4">🎓</div>
            <h1 class="text-3xl font-bold text-gray-900 mb-4">PathFinder - Your Gateway to the Next Level</h1>
            <p class="text-lg text-gray-600 mb-8">Let's discover your perfect educational pathway that will elevate you to the next level!</p>
            <a href="{{ route('pathfinder.step1') }}" class="btn-primary text-lg px-8 py-3">
                Start Your Journey
            </a>
        </div>
    </div>
</div>
@endsection 