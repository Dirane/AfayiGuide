@extends('layouts.admin')

@section('title', 'System Settings')
@section('description', 'Manage system settings and configuration in AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">System Settings</h1>
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- General Settings -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">General Settings</h3>
                <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                        <input type="text" name="site_name" id="site_name" value="{{ $settings['site_name'] ?? 'AfayiGuide' }}" required
                               class="input-field @error('site_name') border-red-500 @enderror">
                        @error('site_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="site_description" class="block text-sm font-medium text-gray-700">Site Description</label>
                        <textarea name="site_description" id="site_description" rows="3" required
                                  class="input-field @error('site_description') border-red-500 @enderror">{{ $settings['site_description'] ?? 'Your pathway to success' }}</textarea>
                        @error('site_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? 'admin@afayiguide.com' }}" required
                               class="input-field @error('contact_email') border-red-500 @enderror">
                        @error('contact_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
                        <input type="text" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '+237 XXX XXX XXX' }}" required
                               class="input-field @error('contact_phone') border-red-500 @enderror">
                        @error('contact_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="max_file_size" class="block text-sm font-medium text-gray-700">Max File Size (KB)</label>
                        <input type="number" name="max_file_size" id="max_file_size" value="{{ $settings['max_file_size'] ?? 2048 }}" required
                               class="input-field @error('max_file_size') border-red-500 @enderror">
                        @error('max_file_size')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="allowed_file_types" class="block text-sm font-medium text-gray-700">Allowed File Types</label>
                        <input type="text" name="allowed_file_types" id="allowed_file_types" value="{{ $settings['allowed_file_types'] ?? 'jpeg,png,jpg,gif' }}" required
                               class="input-field @error('allowed_file_types') border-red-500 @enderror">
                        @error('allowed_file_types')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="registration_enabled" id="registration_enabled" 
                               {{ ($settings['registration_enabled'] ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="registration_enabled" class="ml-2 block text-sm text-gray-900">
                            Enable User Registration
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="maintenance_mode" id="maintenance_mode" 
                               {{ ($settings['maintenance_mode'] ?? false) ? 'checked' : '' }}
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="maintenance_mode" class="ml-2 block text-sm text-gray-900">
                            Maintenance Mode
                        </label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="btn-primary">
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- System Actions -->
            <div class="space-y-6">
                <div class="card">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">System Actions</h3>
                    <div class="space-y-3">
                        <form action="{{ route('admin.settings.backup') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="block w-full btn-outline text-center">
                                Create Backup
                            </button>
                        </form>
                        <p class="text-sm text-gray-600">Create a database backup</p>
                    </div>
                </div>

                <div class="card">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Cache Management</h3>
                    <div class="space-y-3">
                        <form action="{{ route('admin.settings.clearCache') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="block w-full btn-outline text-center">
                                Clear Cache
                            </button>
                        </form>
                        <p class="text-sm text-gray-600">Clear all system cache</p>
                    </div>
                </div>

                <div class="card">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">System Status</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Platform Status</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Online
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Database</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Connected
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Storage</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Normal
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 