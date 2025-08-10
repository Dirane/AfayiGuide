@extends('layouts.admin')

@section('title', 'Create Opportunity')
@section('description', 'Add a new opportunity to the platform')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Create Opportunity</h1>
                    <p class="text-xl text-gray-200">Add a new opportunity for students</p>
                </div>
                <a href="{{ route('admin.opportunities.index') }}" class="btn-accent">
                    Back to Opportunities
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card">
            <form action="{{ route('admin.opportunities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- Basic Information -->
                <div class="border-b border-gray-200 pb-4">
                    <h3 class="text-xl font-semibold text-gray-900">Basic Information</h3>
                    <p class="text-sm text-gray-600 mt-1">Essential details about the opportunity</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Enter opportunity title">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                            Type <span class="text-red-500">*</span>
                        </label>
                        <select name="type" id="type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                            <option value="">Select type</option>
                            <option value="scholarship" {{ old('type') == 'scholarship' ? 'selected' : '' }}>Scholarship</option>
                            <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                            <option value="job" {{ old('type') == 'job' ? 'selected' : '' }}>Job</option>
                            <option value="training" {{ old('type') == 'training' ? 'selected' : '' }}>Training</option>
                            <option value="competition" {{ old('type') == 'competition' ? 'selected' : '' }}>Competition</option>
                        </select>
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Organization -->
                    <div>
                        <label for="organization" class="block text-sm font-semibold text-gray-700 mb-2">
                            Organization <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="organization" id="organization" value="{{ old('organization') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Enter organization name">
                        @error('organization')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Enter location">
                        @error('location')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount</label>
                        <input type="number" name="amount" id="amount" value="{{ old('amount') }}" step="0.01" min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Enter amount">
                        @error('amount')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Currency -->
                    <div>
                        <label for="currency" class="block text-sm font-semibold text-gray-700 mb-2">Currency</label>
                        <select name="currency" id="currency" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                            <option value="">Select currency</option>
                            <option value="XAF" {{ old('currency') == 'XAF' ? 'selected' : '' }}>XAF (CFA Franc)</option>
                            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                            <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                            <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP (British Pound)</option>
                        </select>
                        @error('currency')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label for="deadline" class="block text-sm font-semibold text-gray-700 mb-2">Deadline</label>
                        <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                        @error('deadline')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Application URL -->
                    <div>
                        <label for="application_url" class="block text-sm font-semibold text-gray-700 mb-2">Application URL</label>
                        <input type="url" name="application_url" id="application_url" value="{{ old('application_url') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="https://example.com/apply">
                        @error('application_url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Description & Requirements</h3>
                        <p class="text-sm text-gray-600 mt-1">Detailed information about the opportunity</p>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" id="description" rows="4" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                      placeholder="Enter detailed description of the opportunity">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="requirements" class="block text-sm font-semibold text-gray-700 mb-2">Requirements</label>
                            <textarea name="requirements" id="requirements" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                      placeholder="Enter requirements for the opportunity">{{ old('requirements') }}</textarea>
                            @error('requirements')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="benefits" class="block text-sm font-semibold text-gray-700 mb-2">Benefits</label>
                            <textarea name="benefits" id="benefits" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                      placeholder="Enter benefits of the opportunity">{{ old('benefits') }}</textarea>
                            @error('benefits')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Media & Status -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Media & Status</h3>
                        <p class="text-sm text-gray-600 mt-1">Images and visibility settings</p>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Image</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary-800 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <input type="checkbox" name="is_active" id="is_active" value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded">
                            <label for="is_active" class="ml-3 block text-sm font-medium text-gray-900">
                                Active (visible to students)
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="border-t border-gray-200 pt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.opportunities.index') }}" class="btn-secondary px-6 py-3 rounded-lg">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg">
                        Create Opportunity
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 