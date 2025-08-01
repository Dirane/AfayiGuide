@extends('layouts.app')

@section('title', 'Program Finder')
@section('description', 'Search and filter university/degree programs by location, field, tuition, and more.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Program Finder</h1>
                <p class="text-xl text-gray-200">Discover the perfect university or degree program for your future</p>
            </div>
        </div>
    </div>

    <!-- Program Finder Component -->
    <livewire:program-finder />
</div>
@endsection 