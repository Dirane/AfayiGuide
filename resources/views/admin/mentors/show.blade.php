@extends('layouts.admin')

@section('title', 'Mentor Details')
@section('description', 'View mentor details and sessions')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Header -->
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-16 w-16">
                                @if($mentor->profile_picture)
                                    <img class="h-16 w-16 rounded-full" src="{{ $mentor->profile_picture_url }}" alt="{{ $mentor->name }}">
                                @else
                                    <div class="h-16 w-16 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-gray-600 font-medium text-xl">{{ substr($mentor->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-900">{{ $mentor->name }}</h3>
                                <p class="text-gray-600">{{ $mentor->email }}</p>
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $mentor->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $mentor->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.mentors.edit', $mentor) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit Mentor
                            </a>
                            <form action="{{ route('admin.mentors.destroy', $mentor) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this mentor?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Mentor Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-3">Contact Information</h4>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900">{{ $mentor->email }}</dd>
                                </div>
                                @if($mentor->phone)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="text-sm text-gray-900">{{ $mentor->phone }}</dd>
                                </div>
                                @endif
                                @if($mentor->location)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Location</dt>
                                    <dd class="text-sm text-gray-900">{{ $mentor->location }}</dd>
                                </div>
                                @endif
                            </dl>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 mb-3">Professional Information</h4>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Expertise</dt>
                                    <dd class="text-sm text-gray-900">{{ $mentor->expertise }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Experience</dt>
                                    <dd class="text-sm text-gray-900">{{ $mentor->experience_years }} years</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                                    <dd class="text-sm text-gray-900">{{ number_format($mentor->hourly_rate, 0) }} XAF</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Bio -->
                    @if($mentor->bio)
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-900 mb-3">Bio</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700">{{ $mentor->bio }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Mentorship Sessions -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-900 mb-4">Mentorship Sessions</h4>
                        @if($mentor->mentorshipSessions->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($mentor->mentorshipSessions as $session)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">{{ $session->student->name ?? 'N/A' }}</div>
                                                    <div class="text-sm text-gray-500">{{ $session->student->email ?? 'N/A' }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $session->scheduled_at?->format('M d, Y g:i A') ?? 'N/A' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $session->duration_minutes ?? 'N/A' }} minutes
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                        {{ $session->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                                           ($session->status === 'scheduled' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                                        {{ ucfirst($session->status ?? 'Unknown') }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No mentorship sessions</h3>
                                <p class="mt-1 text-sm text-gray-500">This mentor hasn't had any sessions yet.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-6 border-t">
                        <div>
                            <a href="{{ route('admin.mentors.index') }}" class="text-gray-600 hover:text-gray-900">
                                ← Back to Mentors
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 