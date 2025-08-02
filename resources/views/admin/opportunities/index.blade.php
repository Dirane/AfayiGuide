@extends('layouts.admin')

@section('title', 'Manage Opportunities')
@section('description', 'Manage scholarships, internships, and opportunities in AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Manage Opportunities</h1>
                    <p class="text-xl text-gray-200">Add, edit, and manage scholarships and opportunities</p>
                </div>
                <div>
                    <a href="{{ route('admin.opportunities.create') }}" class="btn-primary">
                        Add New Opportunity
                    </a>
                </div>
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

        <!-- Opportunities Table -->
        <div class="card">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Opportunity
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Organization
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deadline
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
                        @forelse($opportunities as $opportunity)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($opportunity->image)
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Storage::url($opportunity->image) }}" alt="{{ $opportunity->title }}">
                                            </div>
                                        @else
                                            <div class="flex-shrink-0 h-10 w-10 bg-accent rounded-full flex items-center justify-center">
                                                <span class="text-white text-sm font-medium">{{ substr($opportunity->title, 0, 2) }}</span>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $opportunity->title }}</div>
                                            <div class="text-sm text-gray-500">{{ $opportunity->location }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        {{ ucfirst($opportunity->type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $opportunity->organization }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if($opportunity->amount)
                                        {{ number_format($opportunity->amount) }} XAF
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $opportunity->deadline ? $opportunity->deadline->format('M d, Y') : 'No deadline' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($opportunity->is_active)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.opportunities.show', $opportunity) }}" class="text-primary hover:text-primary-800">
                                            View
                                        </a>
                                        <a href="{{ route('admin.opportunities.edit', $opportunity) }}" class="text-blue-600 hover:text-blue-900">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.opportunities.destroy', $opportunity) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this opportunity?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    No opportunities found. <a href="{{ route('admin.opportunities.create') }}" class="text-primary hover:text-primary-800">Add the first opportunity</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($opportunities->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $opportunities->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 