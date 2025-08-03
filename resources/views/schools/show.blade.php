@extends('layouts.app')

@section('title', $school->name)

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">{{ $school->name }}</h1>
                    <p class="text-gray-200 mt-2">{{ ucfirst($school->type) }} • {{ $school->city }}, {{ $school->region }}</p>
                </div>
                <a href="{{ route('schools.index') }}" 
                   class="bg-accent hover:bg-accent/90 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                    Back to Schools
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">About {{ $school->name }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Institution Type</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($school->type) }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                @if($school->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                {{ $school->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Location</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Address</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $school->location }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">City</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $school->city }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Region</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $school->region }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Country</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $school->country }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($school->email)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="mailto:{{ $school->email }}" class="text-primary hover:text-primary/80">{{ $school->email }}</a>
                            </p>
                        </div>
                        @endif
                        @if($school->phone)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Phone</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="tel:{{ $school->phone }}" class="text-primary hover:text-primary/80">{{ $school->phone }}</a>
                            </p>
                        </div>
                        @endif
                        @if($school->website)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Website</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="{{ $school->website }}" target="_blank" class="text-primary hover:text-primary/80">{{ $school->website }}</a>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                @if($school->description)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                    <p class="text-sm text-gray-900">{{ $school->description }}</p>
                </div>
                @endif

                <!-- Programs -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Available Programs ({{ $school->programs->count() }})</h2>
                        <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">View All Programs</a>
                    </div>
                    @if($school->programs->count() > 0)
                        <div class="space-y-3">
                            @foreach($school->programs->take(5) as $program)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-medium text-gray-900">{{ $program->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $program->field_of_study }} • {{ $program->level }}</p>
                                            @if($program->tuition_fee)
                                                <p class="text-sm text-gray-600 mt-1">{{ $program->currency }} {{ number_format($program->tuition_fee) }}</p>
                                            @endif
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($program->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                            {{ $program->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No programs found for this school.</p>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- School Logo -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">School Logo</h3>
                    @if($school->logo)
                        <!-- Display school logo if available -->
                        <img src="{{ Storage::url($school->logo) }}" alt="{{ $school->name }}" class="w-full h-32 object-contain rounded">
                    @else
                        <!-- Fallback to school initial if no logo -->
                        <div class="w-full h-32 bg-gray-100 rounded flex items-center justify-center">
                            <span class="text-gray-400 text-4xl font-bold">{{ substr($school->name, 0, 1) }}</span>
                        </div>
                    @endif
                </div>

                <!-- School Images Gallery -->
                @if($school->images && count($school->images) > 0)
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">School Images</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($school->images as $image)
                            <!-- Display each school image in a grid -->
                            <img src="{{ Storage::url($image) }}" alt="School image" class="w-full h-24 object-cover rounded">
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Quick Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Stats</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Total Programs</span>
                            <span class="text-sm font-medium text-gray-900">{{ $school->programs->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Active Programs</span>
                            <span class="text-sm font-medium text-gray-900">{{ $school->programs->where('is_active', true)->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Location</span>
                            <span class="text-sm font-medium text-gray-900">{{ $school->city }}, {{ $school->region }}</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Get in Touch</h3>
                    <div class="space-y-3">
                        @if($school->email)
                            <a href="mailto:{{ $school->email }}" 
                               class="block w-full bg-primary text-white text-center py-2 px-4 rounded-md hover:bg-primary/90 transition-colors">
                                Send Email
                            </a>
                        @endif
                        @if($school->phone)
                            <a href="tel:{{ $school->phone }}" 
                               class="block w-full bg-green-600 text-white text-center py-2 px-4 rounded-md hover:bg-green-700 transition-colors">
                                Call Now
                            </a>
                        @endif
                        @if($school->website)
                            <a href="{{ $school->website }}" target="_blank" 
                               class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                                Visit Website
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 