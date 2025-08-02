@extends('layouts.admin')

@section('title', 'View School')
@section('description', 'View school details in AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $school->name }}</h1>
                    <p class="text-xl text-gray-200">School Details</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.schools.edit', $school) }}" class="btn-outline">
                        Edit School
                    </a>
                    <a href="{{ route('admin.schools.index') }}" class="btn-primary">
                        Back to Schools
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- School Details -->
            <div class="lg:col-span-2">
                <div class="card">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">School Information</h3>
                    
                    @if($school->image)
                        <div class="mb-6">
                            <img src="{{ Storage::url($school->image) }}" alt="{{ $school->name }}" class="w-full h-64 object-cover rounded-lg">
                        </div>
                    @endif

                    <div class="space-y-4">
                        <div>
                            <h4 class="font-medium text-gray-900">Description</h4>
                            <p class="text-gray-600 mt-1">{{ $school->description }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-medium text-gray-900">Type</h4>
                                <p class="text-gray-600 mt-1">{{ ucfirst($school->type) }}</p>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Location</h4>
                                <p class="text-gray-600 mt-1">{{ $school->location }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-medium text-gray-900">Email</h4>
                                <p class="text-gray-600 mt-1">{{ $school->email }}</p>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Phone</h4>
                                <p class="text-gray-600 mt-1">{{ $school->phone }}</p>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-medium text-gray-900">Website</h4>
                            <a href="{{ $school->website }}" target="_blank" class="text-primary hover:text-primary-800 mt-1">{{ $school->website }}</a>
                        </div>
                    </div>
                </div>

                <!-- Admission Requirements -->
                @if($school->admission_requirements && count($school->admission_requirements) > 0)
                    <div class="card mt-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Admission Requirements</h3>
                        <ul class="space-y-2">
                            @foreach($school->admission_requirements as $requirement)
                                <li class="flex items-start">
                                    <span class="text-accent mr-2">•</span>
                                    <span class="text-gray-700">{{ $requirement }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Application Steps -->
                @if($school->application_steps && count($school->application_steps) > 0)
                    <div class="card mt-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Application Steps</h3>
                        <ol class="space-y-2">
                            @foreach($school->application_steps as $index => $step)
                                <li class="flex items-start">
                                    <span class="bg-primary text-white text-xs rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5">{{ $index + 1 }}</span>
                                    <span class="text-gray-700">{{ $step }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endif

                <!-- Required Documents -->
                @if($school->required_documents && count($school->required_documents) > 0)
                    <div class="card mt-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Required Documents</h3>
                        <ul class="space-y-2">
                            @foreach($school->required_documents as $document)
                                <li class="flex items-start">
                                    <span class="text-accent mr-2">📄</span>
                                    <span class="text-gray-700">{{ $document }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Programs Offered -->
                @if($school->programs_offered && count($school->programs_offered) > 0)
                    <div class="card mt-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Programs Offered</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($school->programs_offered as $program)
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <span class="text-gray-700">{{ $program }}</span>
                                </div>
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
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Active</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Yes
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Created</span>
                            <span class="text-sm text-gray-900">{{ $school->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Updated</span>
                            <span class="text-sm text-gray-900">{{ $school->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.schools.edit', $school) }}" class="block w-full btn-primary text-center">
                            Edit School
                        </a>
                        <form action="{{ route('admin.schools.destroy', $school) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this school?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block w-full btn-outline text-center text-red-600 hover:text-red-700">
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