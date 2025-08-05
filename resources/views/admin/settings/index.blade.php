@extends('layouts.admin')

@section('title', 'Platform Settings')
@section('description', 'Admin panel for managing platform settings.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Platform Settings</h1>
                <p class="text-xl text-gray-200">Configure platform settings and preferences</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- General Settings -->
            <div class="space-y-6">
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">General Settings</h3>
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        
                        <div class="space-y-4">
                            <div>
                                <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                                <input type="text" name="site_name" id="site_name" value="{{ $settings['site_name'] ?? 'AfayiGuide' }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            </div>

                            <div>
                                <label for="site_description" class="block text-sm font-medium text-gray-700">Site Description</label>
                                <textarea name="site_description" id="site_description" rows="3"
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">{{ $settings['site_description'] ?? 'Your pathway to educational success in Cameroon.' }}</textarea>
                            </div>

                            <div>
                                <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                                <input type="email" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            </div>

                            <div>
                                <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
                                <input type="text" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                Save General Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- File Upload Settings -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">File Upload Settings</h3>
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        
                        <div class="space-y-4">
                            <div>
                                <label for="max_file_size" class="block text-sm font-medium text-gray-700">Maximum File Size (MB)</label>
                                <input type="number" name="max_file_size" id="max_file_size" value="{{ $settings['max_file_size'] ?? 2 }}" min="1" max="10"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            </div>

                            <div>
                                <label for="allowed_file_types" class="block text-sm font-medium text-gray-700">Allowed File Types</label>
                                <input type="text" name="allowed_file_types" id="allowed_file_types" value="{{ $settings['allowed_file_types'] ?? 'jpg,jpeg,png,gif,pdf' }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                                <p class="mt-1 text-sm text-gray-500">Comma-separated list (e.g., jpg,jpeg,png,pdf)</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                Save Upload Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- System Settings -->
            <div class="space-y-6">
                <!-- Registration Settings -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Registration Settings</h3>
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="allow_registration" id="allow_registration" value="1" 
                                       {{ ($settings['allow_registration'] ?? true) ? 'checked' : '' }}
                                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <label for="allow_registration" class="ml-2 block text-sm text-gray-900">
                                    Allow new user registrations
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="email_verification" id="email_verification" value="1" 
                                       {{ ($settings['email_verification'] ?? false) ? 'checked' : '' }}
                                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <label for="email_verification" class="ml-2 block text-sm text-gray-900">
                                    Require email verification
                                </label>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                Save Registration Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Maintenance Mode -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Maintenance Mode</h3>
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1" 
                                       {{ ($settings['maintenance_mode'] ?? false) ? 'checked' : '' }}
                                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <label for="maintenance_mode" class="ml-2 block text-sm text-gray-900">
                                    Enable maintenance mode
                                </label>
                            </div>

                            <div>
                                <label for="maintenance_message" class="block text-sm font-medium text-gray-700">Maintenance Message</label>
                                <textarea name="maintenance_message" id="maintenance_message" rows="3"
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">{{ $settings['maintenance_message'] ?? 'We are currently performing maintenance. Please check back later.' }}</textarea>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                Save Maintenance Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- System Actions -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">System Actions</h3>
                    <div class="space-y-4">
                        <form method="POST" action="{{ route('admin.settings.backup') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-secondary w-full">
                                Create Database Backup
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.settings.clearCache') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-secondary w-full">
                                Clear Application Cache
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 