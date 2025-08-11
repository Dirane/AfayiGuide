@extends('layouts.admin')

@section('title', 'Manage Schools')
@section('description', 'Admin panel for managing schools.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Manage Schools</h1>
                    <p class="text-xl text-gray-200">Add, edit, and manage educational institutions</p>
                </div>
                <a href="{{ route('admin.schools.create') }}" class="btn-accent">
                    Add New School
                </a>
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

        <div class="card">
            <!-- Filters -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <form method="GET" action="{{ route('admin.schools.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                   placeholder="Search schools..." 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                        </div>
                        
                        <!-- Type Filter -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">School Type</label>
                            <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                                <option value="all" {{ request('type') == 'all' || !request('type') ? 'selected' : '' }}>All Types</option>
                                <option value="university" {{ request('type') == 'university' ? 'selected' : '' }}>University</option>
                                <option value="college" {{ request('type') == 'college' ? 'selected' : '' }}>College</option>
                                <option value="institute" {{ request('type') == 'institute' ? 'selected' : '' }}>Institute</option>
                                <option value="polytechnic" {{ request('type') == 'polytechnic' ? 'selected' : '' }}>Polytechnic</option>
                                <option value="vocational" {{ request('type') == 'vocational' ? 'selected' : '' }}>Vocational</option>
                                <option value="secondary" {{ request('type') == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                <option value="primary" {{ request('type') == 'primary' ? 'selected' : '' }}>Primary</option>
                            </select>
                        </div>
                        
                        <!-- Status Filter -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                                <option value="all" {{ request('status') == 'all' || !request('status') ? 'selected' : '' }}>All Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        
                        <!-- Filter Actions -->
                        <div class="flex items-end space-x-2">
                            <button type="submit" class="btn-primary px-4 py-2">
                                Filter
                            </button>
                            <a href="{{ route('admin.schools.index') }}" class="btn-outline px-4 py-2">
                                Clear
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                School
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Location
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($schools as $school)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($school->image_url)
                                            <img src="{{ $school->image_url }}" alt="{{ $school->name }}" class="h-10 w-10 rounded-full object-cover">
                                        @else
                                            <div class="h-10 w-10 bg-primary rounded-full flex items-center justify-center">
                                                <span class="text-white text-sm font-medium">{{ substr($school->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $school->name }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($school->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ ucfirst($school->type) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $school->location }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                        @if($school->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                        {{ $school->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.schools.show', $school) }}" class="text-primary hover:text-primary-800">
                                            View
                                        </a>
                                        <a href="{{ route('admin.schools.edit', $school) }}" class="text-blue-600 hover:text-blue-800">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.schools.destroy', $school) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" 
                                                    onclick="return confirm('Are you sure you want to delete this school?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    No schools found. <a href="{{ route('admin.schools.create') }}" class="text-primary hover:text-primary-800">Add the first school</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($schools->hasPages())
            <div class="mt-6">
                {{ $schools->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 