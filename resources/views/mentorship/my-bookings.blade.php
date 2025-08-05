@extends('layouts.app')

@section('title', 'My Mentorship Bookings')
@section('description', 'View your mentorship session bookings and their status.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">My Mentorship Bookings</h1>
            <p class="text-lg text-gray-600">Track your mentorship session bookings and their progress</p>
        </div>

        @if($bookings->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($bookings as $booking)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Booking #{{ $booking->id }}</h3>
                            <p class="text-sm text-gray-600">{{ $booking->created_at->format('M d, Y') }}</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status_badge }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Session Duration:</span>
                            <span class="text-sm text-gray-900">{{ $booking->duration_text }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Amount:</span>
                            <span class="text-sm text-gray-900">{{ number_format($booking->amount) }} XAF</span>
                        </div>
                        @if($booking->session_topic)
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Topic:</span>
                            <span class="text-sm text-gray-900">{{ Str::limit($booking->session_topic, 30) }}</span>
                        </div>
                        @endif
                        @if($booking->assignedMentor)
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Assigned Mentor:</span>
                            <span class="text-sm text-gray-900">{{ $booking->assignedMentor->name }}</span>
                        </div>
                        @endif
                        @if($booking->scheduled_at)
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Scheduled:</span>
                            <span class="text-sm text-gray-900">{{ $booking->scheduled_at->format('M d, Y g:i A') }}</span>
                        </div>
                        @endif
                    </div>

                    @if($booking->status === 'pending')
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mb-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-sm text-yellow-800">Waiting for mentor assignment. You'll be contacted within 24 hours.</p>
                        </div>
                    </div>
                    @elseif($booking->status === 'assigned')
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="text-sm text-blue-800">Mentor assigned! Check your WhatsApp for contact details.</p>
                        </div>
                    </div>
                    @elseif($booking->status === 'completed')
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-sm text-green-800">Session completed on {{ $booking->completed_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-600">
                            Contact: {{ $booking->whatsapp_number }}
                        </div>
                        @if($booking->status === 'pending')
                        <button class="bg-gray-300 text-gray-600 px-3 py-1 rounded text-sm" disabled>
                            Waiting for Assignment
                        </button>
                        @elseif($booking->status === 'assigned')
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->whatsapp_number) }}" 
                           target="_blank" 
                           class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                            Contact Mentor
                        </a>
                        @elseif($booking->status === 'completed')
                        <a href="{{ route('mentorship.index') }}" 
                           class="bg-primary hover:bg-primary-dark text-white px-3 py-1 rounded text-sm">
                            Book Again
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No Bookings Yet</h3>
                <p class="text-gray-600 mb-6">You haven't booked any mentorship sessions yet. Book your first session to get started!</p>
                <a href="{{ route('mentorship.index') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded">
                    Book Your First Session
                </a>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="mt-8 flex justify-center">
            <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded mr-4">
                Back to Dashboard
            </a>
            <a href="{{ route('mentorship.index') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded">
                Book New Session
            </a>
        </div>
    </div>
</div>
@endsection 