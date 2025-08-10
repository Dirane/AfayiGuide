@extends('layouts.admin')

@section('title', 'Add New Mentor')
@section('description', 'Add a new mentor to the AfayiGuide platform')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Add New Mentor</h1>
                    <p class="text-xl text-gray-200">Create a new mentor account</p>
                </div>
                <a href="{{ route('admin.mentors.index') }}" class="btn-accent">
                    Back to Mentors
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card">
            <form method="POST" action="{{ route('admin.mentors.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Personal Information -->
                <div class="border-b border-gray-200 pb-4">
                    <h3 class="text-xl font-semibold text-gray-900">Personal Information</h3>
                    <p class="text-sm text-gray-600 mt-1">Basic details about the mentor</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Enter full name">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="email@example.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Create a secure password">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="Confirm your password">
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="+1234567890">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                               placeholder="City, Country">
                        @error('location')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Professional Information</h3>
                        <p class="text-sm text-gray-600 mt-1">Expertise and experience details</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="expertise" class="block text-sm font-semibold text-gray-700 mb-2">
                                Area of Expertise <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="expertise" id="expertise" value="{{ old('expertise') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                   placeholder="e.g., Computer Science, Business, Medicine">
                            @error('expertise')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="experience_years" class="block text-sm font-semibold text-gray-700 mb-2">
                                Years of Experience <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="experience_years" id="experience_years" value="{{ old('experience_years') }}" min="0" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                   placeholder="e.g., 5">
                            @error('experience_years')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hourly_rate" class="block text-sm font-semibold text-gray-700 mb-2">
                                Hourly Rate (XAF) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate') }}" min="0" step="1000" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                   placeholder="e.g., 50000">
                            @error('hourly_rate')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Additional Information</h3>
                        <p class="text-sm text-gray-600 mt-1">Bio and profile details</p>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="bio" class="block text-sm font-semibold text-gray-700 mb-2">Bio</label>
                            <textarea name="bio" id="bio" rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                      placeholder="Tell us about the mentor's background, qualifications, and teaching approach...">{{ old('bio') }}</textarea>
                            @error('bio')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="profile_picture" class="block text-sm font-semibold text-gray-700 mb-2">Profile Picture</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="profile_picture" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary-800 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                            <span>Upload a file</span>
                                            <input id="profile_picture" name="profile_picture" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            @error('profile_picture')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="is_active" class="ml-3 block text-sm font-medium text-gray-900">
                            Active Mentor
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="border-t border-gray-200 pt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.mentors.index') }}" class="btn-secondary px-6 py-3 rounded-lg">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg">
                        Create Mentor
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 