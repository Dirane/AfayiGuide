@extends('layouts.app')

@section('title', '1-on-1 Mentorship')
@section('description', 'Book sessions with experienced mentors and counselors for personalized guidance.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">1-on-1 Mentorship</h1>
                <p class="text-xl text-gray-200">Book sessions with experienced mentors and counselors</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card text-center">
            <div class="text-6xl mb-4">👥</div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Coming Soon</h2>
            <p class="text-gray-600 mb-6">The mentorship booking system is under development. You'll soon be able to book sessions with expert mentors!</p>
            <a href="{{ route('home') }}" class="btn-primary">Back to Home</a>
        </div>
    </div>
</div>
@endsection 