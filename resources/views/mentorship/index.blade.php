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

    <!-- Mentorship Component -->
    <livewire:mentorship-booking />
</div>
@endsection 