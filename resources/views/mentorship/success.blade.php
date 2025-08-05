@extends('layouts.app')

@section('title', 'Booking Confirmed')
@section('description', 'Your mentorship session has been booked successfully.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Booking Confirmed!</h1>
                <p class="text-lg text-gray-600">Your mentorship session has been booked successfully</p>
            </div>

            <!-- Booking Details -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Booking Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Booking ID</p>
                        <p class="text-lg font-semibold text-gray-900">#{{ $booking->id }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Session Duration</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $booking->duration_text }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Amount</p>
                        <p class="text-lg font-semibold text-gray-900">{{ number_format($booking->amount) }} XAF</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Status</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status_badge }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">What happens next?</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full w-8 h-8 flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-blue-600 font-bold text-sm">1</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Review & Assignment</h3>
                            <p class="text-gray-600">We'll review your booking and assign the best mentor for your specific needs within 24 hours.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full w-8 h-8 flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-blue-600 font-bold text-sm">2</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Mentor Contact</h3>
                            <p class="text-gray-600">The assigned mentor will contact you via WhatsApp at <strong>{{ $booking->whatsapp_number }}</strong> to discuss payment and schedule.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full w-8 h-8 flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-blue-600 font-bold text-sm">3</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Session & Guidance</h3>
                            <p class="text-gray-600">Complete your payment and receive personalized guidance for your educational journey.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-blue-900 mb-4">Your Contact Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-medium text-blue-700">Name</p>
                        <p class="text-blue-900">{{ $booking->full_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-blue-700">WhatsApp</p>
                        <p class="text-blue-900">{{ $booking->whatsapp_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-blue-700">Email</p>
                        <p class="text-blue-900">{{ $booking->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-blue-700">Session Topic</p>
                        <p class="text-blue-900">{{ $booking->session_topic ?: 'Not specified' }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('dashboard') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-lg text-center">
                    Back to Dashboard
                </a>
                <a href="{{ route('mentorship.my-bookings') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg text-center">
                    View My Bookings
                </a>
                <a href="{{ route('mentorship.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-center">
                    Book Another Session
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 