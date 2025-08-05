@extends('layouts.admin')

@section('title', 'Booking Details')
@section('description', 'View and manage mentorship booking details')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Booking #{{ $booking->id }}</h2>
                    <a href="{{ route('admin.mentorship-bookings.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        ← Back to Bookings
                    </a>
                </div>

                <!-- Booking Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Client Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Full Name</p>
                                <p class="text-gray-900">{{ $booking->full_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Email</p>
                                <p class="text-gray-900">{{ $booking->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">WhatsApp</p>
                                <p class="text-gray-900">{{ $booking->whatsapp_number }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">User Account</p>
                                <p class="text-gray-900">{{ $booking->user->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Session Details</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Duration</p>
                                <p class="text-gray-900">{{ $booking->duration_text }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Amount</p>
                                <p class="text-gray-900">{{ number_format($booking->amount) }} XAF</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Status</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status_badge }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Booked On</p>
                                <p class="text-gray-900">{{ $booking->created_at->format('M d, Y g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Session Topic & Notes -->
                @if($booking->session_topic || $booking->additional_notes)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Session Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($booking->session_topic)
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-medium text-blue-900 mb-2">Session Topic</h4>
                            <p class="text-blue-800">{{ $booking->session_topic }}</p>
                        </div>
                        @endif
                        @if($booking->additional_notes)
                        <div class="bg-yellow-50 rounded-lg p-4">
                            <h4 class="font-medium text-yellow-900 mb-2">Additional Notes</h4>
                            <p class="text-yellow-800">{{ $booking->additional_notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Mentor Assignment -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Mentor Assignment</h3>
                    
                    @if($booking->status === 'pending')
                    <form method="POST" action="{{ route('admin.mentorship-bookings.assign-mentor', $booking) }}" class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="mentor_id" class="block text-sm font-medium text-gray-700 mb-2">Select Mentor</label>
                                <select name="mentor_id" id="mentor_id" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                                    <option value="">Choose a mentor...</option>
                                    @foreach($mentors as $mentor)
                                    <option value="{{ $mentor->id }}" {{ $booking->assigned_mentor_id == $mentor->id ? 'selected' : '' }}>
                                        {{ $mentor->name }} ({{ $mentor->email }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="scheduled_at" class="block text-sm font-medium text-gray-700 mb-2">Schedule Date (Optional)</label>
                                <input type="datetime-local" name="scheduled_at" id="scheduled_at" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Assign Mentor
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Assigned Mentor</p>
                                <p class="text-gray-900">{{ $booking->assignedMentor ? $booking->assignedMentor->name : 'Not assigned' }}</p>
                            </div>
                            @if($booking->scheduled_at)
                            <div>
                                <p class="text-sm font-medium text-gray-600">Scheduled Date</p>
                                <p class="text-gray-900">{{ $booking->scheduled_at->format('M d, Y g:i A') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Status Update -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                    <form method="POST" action="{{ route('admin.mentorship-bookings.update-status', $booking) }}" class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="status" id="status" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="assigned" {{ $booking->status === 'assigned' ? 'selected' : '' }}>Assigned</option>
                                    <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <div id="completed_date_div" class="hidden">
                                <label for="completed_at" class="block text-sm font-medium text-gray-700 mb-2">Completion Date</label>
                                <input type="datetime-local" name="completed_at" id="completed_at" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Status
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center">
                    <form method="POST" action="{{ route('admin.mentorship-bookings.destroy', $booking) }}" onsubmit="return confirm('Are you sure you want to delete this booking?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete Booking
                        </button>
                    </form>
                    
                    <div class="flex space-x-2">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->whatsapp_number) }}" 
                           target="_blank" 
                           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Contact via WhatsApp
                        </a>
                        <a href="mailto:{{ $booking->email }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Send Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusSelect = document.getElementById('status');
    const completedDateDiv = document.getElementById('completed_date_div');
    const completedDateInput = document.getElementById('completed_at');

    statusSelect.addEventListener('change', function() {
        if (this.value === 'completed') {
            completedDateDiv.classList.remove('hidden');
            completedDateInput.required = true;
        } else {
            completedDateDiv.classList.add('hidden');
            completedDateInput.required = false;
        }
    });

    // Check on page load
    if (statusSelect.value === 'completed') {
        completedDateDiv.classList.remove('hidden');
        completedDateInput.required = true;
    }
});
</script>
@endsection 