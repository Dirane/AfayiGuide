@extends('layouts.app')

@section('title', $program->name)

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">{{ $program->name }}</h1>
                    <p class="text-gray-200 mt-2">{{ $program->field_of_study }} • {{ ucfirst($program->level) }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.programs.edit', $program) }}" 
                       class="bg-accent hover:bg-accent/90 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Edit Program
                    </a>
                    <a href="{{ route('admin.programs.index') }}" 
                       class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Back to Programs
                    </a>
                </div>
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
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Program Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Program Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Field of Study</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->field_of_study }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Level</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($program->level) }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Duration</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->duration_months }} months</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                @if($program->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                {{ $program->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Featured</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                @if($program->is_featured) bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif">
                                {{ $program->is_featured ? 'Featured' : 'Not Featured' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- School Information -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">School Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">School</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->school->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">School Type</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($program->school->type ?? 'N/A') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Location</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->location ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Institution</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->institution ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Financial Information -->
                @if($program->tuition_fee)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Financial Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Tuition Fee</label>
                            <p class="mt-1 text-sm text-gray-900">{{ number_format($program->tuition_fee) }} {{ $program->currency }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Important Dates -->
                @if($program->application_deadline || $program->start_date)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Important Dates</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($program->application_deadline)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Application Deadline</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->application_deadline }}</p>
                        </div>
                        @endif
                        @if($program->start_date)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Start Date</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $program->start_date }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Contact Information -->
                @if($program->contact_email || $program->contact_phone || $program->website)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($program->contact_email)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Contact Email</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="mailto:{{ $program->contact_email }}" class="text-primary hover:text-primary/80">{{ $program->contact_email }}</a>
                            </p>
                        </div>
                        @endif
                        @if($program->contact_phone)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Contact Phone</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="tel:{{ $program->contact_phone }}" class="text-primary hover:text-primary/80">{{ $program->contact_phone }}</a>
                            </p>
                        </div>
                        @endif
                        @if($program->website)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500">Website</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="{{ $program->website }}" target="_blank" class="text-primary hover:text-primary/80">{{ $program->website }}</a>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Description -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                    <p class="text-sm text-gray-900">{{ $program->description }}</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Program Images -->
                @if($program->images && count($program->images) > 0)
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Program Images</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($program->images as $image)
                            <img src="{{ Storage::url($image) }}" alt="Program image" class="w-full h-24 object-cover rounded">
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Quick Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Stats</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Duration</span>
                            <span class="text-sm font-medium text-gray-900">{{ $program->duration_months }} months</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Level</span>
                            <span class="text-sm font-medium text-gray-900">{{ ucfirst($program->level) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Field</span>
                            <span class="text-sm font-medium text-gray-900">{{ $program->field_of_study }}</span>
                        </div>
                        @if($program->tuition_fee)
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Tuition</span>
                            <span class="text-sm font-medium text-gray-900">{{ number_format($program->tuition_fee) }} {{ $program->currency }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.programs.edit', $program) }}" 
                           class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                            Edit Program
                        </a>
                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="block w-full bg-red-600 text-white text-center py-2 px-4 rounded-md hover:bg-red-700 transition-colors"
                                    onclick="return confirm('Are you sure you want to delete this program?')">
                                Delete Program
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 