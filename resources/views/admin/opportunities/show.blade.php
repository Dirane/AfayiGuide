@extends('layouts.admin')

@section('title', 'Opportunity Details')
@section('description', 'View opportunity information')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Opportunity Details</h1>
            <p class="text-gray-600">View opportunity information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.opportunities.edit', $opportunity) }}" class="btn-primary">
                Edit Opportunity
            </a>
            <a href="{{ route('admin.opportunities.index') }}" class="btn-outline">
                Back to Opportunities
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $opportunity->title }}</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($opportunity->type) }}
                                </span>
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Organization</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $opportunity->organization }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Location</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $opportunity->location ?? 'Not specified' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($opportunity->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Description</h2>
                <div class="prose max-w-none">
                    <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $opportunity->description }}</p>
                </div>
            </div>

            <!-- Requirements -->
            @if($opportunity->requirements)
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Requirements</h2>
                    <div class="space-y-2">
                        @if(is_array($opportunity->requirements))
                            @foreach($opportunity->requirements as $requirement)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700">{{ $requirement }}</span>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $opportunity->requirements }}</p>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Benefits -->
            @if($opportunity->benefits)
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Benefits</h2>
                    <div class="space-y-2">
                        @if(is_array($opportunity->benefits))
                            @foreach($opportunity->benefits as $benefit)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700">{{ $benefit }}</span>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $opportunity->benefits }}</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Image -->
                        @if($opportunity->first_image_url)
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Image</h2>
                <img src="{{ $opportunity->first_image_url }}" alt="Opportunity image" class="w-full h-48 object-cover rounded-lg">
            </div>
            @endif

            <!-- Financial Information -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Financial Information</h2>
                <div class="space-y-3">
                    @if($opportunity->amount)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Amount</label>
                        <p class="mt-1 text-sm text-gray-900">
                            {{ number_format($opportunity->amount, 2) }} {{ $opportunity->currency ?? 'XAF' }}
                        </p>
                    </div>
                    @endif
                    
                    @if($opportunity->deadline)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deadline</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $opportunity->deadline->format('M d, Y') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Application Information -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Application Information</h2>
                <div class="space-y-3">
                    @if($opportunity->application_url)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Application URL</label>
                        <a href="{{ $opportunity->application_url }}" target="_blank" class="text-primary hover:text-primary-800 text-sm">
                            {{ $opportunity->application_url }}
                        </a>
                    </div>
                    @endif
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Posted By</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $opportunity->postedBy->name ?? 'Admin' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Created</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $opportunity->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $opportunity->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Actions</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.opportunities.edit', $opportunity) }}" class="w-full btn-primary text-center">
                        Edit Opportunity
                    </a>
                    
                    <form action="{{ route('admin.opportunities.destroy', $opportunity) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full btn-outline text-red-600 border-red-600 hover:bg-red-50" 
                                onclick="return confirm('Are you sure you want to delete this opportunity?')">
                            Delete Opportunity
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 