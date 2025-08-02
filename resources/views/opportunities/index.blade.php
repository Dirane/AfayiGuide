@extends('layouts.app')

@section('title', 'Opportunities Board')
@section('description', 'Discover scholarships, internships, jobs, and admissions opportunities.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Opportunities Board</h1>
                <p class="text-xl text-gray-200">Discover scholarships, internships, jobs, and admissions opportunities</p>
            </div>
        </div>
    </div>

    <!-- Opportunities Component -->
    <livewire:opportunity-finder />
</div>
@endsection 