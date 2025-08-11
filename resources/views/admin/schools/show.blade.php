@extends('layouts.admin')

@section('title', 'School Details')
@section('description', 'View school information and details.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $school->name }}</h1>
                    <p class="text-xl text-gray-200">{{ ucfirst($school->type) }} • {{ $school->location }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.schools.edit', $school) }}" class="btn-accent">
                        Edit School
                    </a>
                    <a href="{{ route('admin.schools.index') }}" class="btn-secondary">
                        Back to Schools
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- School Image -->
                @if($school->image_url)
                    <div class="card">
                        <img src="{{ $school->image_url }}" alt="{{ $school->name }}" 
                             class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <!-- Description -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                    <p class="text-gray-700">{{ $school->description ?: 'No description available.' }}</p>
                </div>

                <!-- Contact Information -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                    <div class="space-y-3">
                        @if($school->contact_email)
                            <div class="flex items-center">
                                <span class="text-gray-500 w-24">Email:</span>
                                <a href="mailto:{{ $school->contact_email }}" class="text-primary hover:text-primary-800">
                                    {{ $school->contact_email }}
                                </a>
                            </div>
                        @endif
                        @if($school->contact_phone)
                            <div class="flex items-center">
                                <span class="text-gray-500 w-24">Phone:</span>
                                <a href="tel:{{ $school->contact_phone }}" class="text-primary hover:text-primary-800">
                                    {{ $school->contact_phone }}
                                </a>
                            </div>
                        @endif
                        @if($school->website)
                            <div class="flex items-center">
                                <span class="text-gray-500 w-24">Website:</span>
                                <a href="{{ $school->website }}" target="_blank" class="text-primary hover:text-primary-800">
                                    {{ $school->website }}
                                </a>
                            </div>
                        @endif
                        @if($school->address)
                            <div class="flex items-start">
                                <span class="text-gray-500 w-24">Address:</span>
                                <span class="text-gray-700">{{ $school->address }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Admission Requirements -->
                @if($school->admission_requirements && count($school->admission_requirements) > 0)
                    <div class="card">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Admission Requirements</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-700">
                            @foreach($school->admission_requirements as $requirement)
                                <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Application Steps -->
                @if($school->application_steps && count($school->application_steps) > 0)
                    <div class="card">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Steps</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-700">
                            @foreach($school->application_steps as $step)
                                <li>{{ $step }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif

                <!-- Required Documents -->
                @if($school->required_documents && count($school->required_documents) > 0)
                    <div class="card">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Required Documents</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-700">
                            @foreach($school->required_documents as $document)
                                <li>{{ $document }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Programs Offered -->
                @if($school->programs_offered && count($school->programs_offered) > 0)
                    <div class="card">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Programs Offered</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach($school->programs_offered as $program)
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                                    {{ $program }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Status</h3>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            @if($school->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $school->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <!-- School Information -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">School Information</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-500 text-sm">Type:</span>
                            <p class="text-gray-900">{{ ucfirst($school->type) }}</p>
                        </div>
                        <div>
                            <span class="text-gray-500 text-sm">Location:</span>
                            <p class="text-gray-900">{{ $school->location }}</p>
                        </div>
                        <div>
                            <span class="text-gray-500 text-sm">Created:</span>
                            <p class="text-gray-900">{{ $school->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <span class="text-gray-500 text-sm">Last Updated:</span>
                            <p class="text-gray-900">{{ $school->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.schools.edit', $school) }}" class="w-full btn-primary text-center">
                            Edit School
                        </a>
                        <form method="POST" action="{{ route('admin.schools.destroy', $school) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full btn-secondary text-center" 
                                    onclick="return confirm('Are you sure you want to delete this school?')">
                                Delete School
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 