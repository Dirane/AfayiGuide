@extends('layouts.app')

@section('title', $school->name)
@section('description', $school->description)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8 flex justify-between items-center">
        <a href="{{ route('schools.index') }}" class="btn-accent">← Back to Schools</a>
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="btn-outline">
                    ← Back to Admin Dashboard
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="btn-outline">
                    ← Back to {{ auth()->user()->getDashboardTitle() }}
                </a>
            @endif
        @endauth
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- School Header -->
            <div class="card">
                <div class="flex items-start space-x-6">
                    @if($school->image)
                        <img src="{{ $school->imageUrl }}" alt="{{ $school->name }}" class="w-32 h-32 object-cover rounded-lg">
                    @else
                        <div class="w-32 h-32 bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $school->name }}</h1>
                        <div class="flex items-center space-x-4 text-gray-600 mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                {{ $school->formatted_type }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $school->location }}
                            </span>
                        </div>
                        <p class="text-gray-600">{{ $school->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card">
                <h3 class="text-xl font-semibold mb-4">Contact Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($school->contact_email)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:{{ $school->contact_email }}" class="text-primary hover:underline">{{ $school->contact_email }}</a>
                        </div>
                    @endif
                    @if($school->contact_phone)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <a href="tel:{{ $school->contact_phone }}" class="text-primary hover:underline">{{ $school->contact_phone }}</a>
                        </div>
                    @endif
                    @if($school->website)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                            </svg>
                            <a href="{{ $school->website }}" target="_blank" class="text-primary hover:underline">Visit Website</a>
                        </div>
                    @endif
                    @if($school->address)
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ $school->address }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Admission Requirements -->
            @if($school->admission_requirements)
                <div class="card">
                    <h3 class="text-xl font-semibold mb-4">Admission Requirements</h3>
                    <ul class="space-y-2">
                        @foreach($school->admission_requirements as $requirement)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $requirement }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Application Steps -->
            @if($school->application_steps)
                <div class="card">
                    <h3 class="text-xl font-semibold mb-4">Application Process</h3>
                    <div class="space-y-4">
                        @foreach($school->application_steps as $index => $step)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center text-sm font-bold mr-4">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1">
                                    <p class="text-gray-700">{{ $step }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Required Documents -->
            @if($school->required_documents)
                <div class="card">
                    <h3 class="text-xl font-semibold mb-4">Required Documents</h3>
                    <ul class="space-y-2">
                        @foreach($school->required_documents as $document)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                {{ $document }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Programs Offered -->
            @if($school->programs_offered)
                <div class="card">
                    <h3 class="text-xl font-semibold mb-4">Programs Offered</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($school->programs_offered as $program)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900">{{ $program }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- School Information -->
            <div class="card">
                <h3 class="text-lg font-semibold mb-4">School Information</h3>
                <div class="space-y-3">
                    <div>
                        <span class="text-sm text-gray-500">Type:</span>
                        <p class="font-medium">{{ $school->formatted_type }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Location:</span>
                        <p class="font-medium">{{ $school->location }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Status:</span>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium @if($school->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $school->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    @if($school->website)
                        <a href="{{ $school->website }}" target="_blank" class="block w-full btn-outline text-center">
                            Visit Website
                        </a>
                    @endif
                    @if($school->contact_email)
                        <a href="mailto:{{ $school->contact_email }}" class="block w-full btn-outline text-center">
                            Contact School
                        </a>
                    @endif
                    @auth
                        
                    @else
                        <a href="{{ route('login') }}" class="block w-full btn-accent text-center">
                            Login to Request Assistance
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Similar Schools -->
            <div class="card">
                <h3 class="text-lg font-semibold mb-4">Similar Schools</h3>
                <p class="text-gray-600 text-sm">More schools in this category coming soon...</p>
            </div>
        </div>
    </div>
</div>
@endsection 