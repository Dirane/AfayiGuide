@extends('layouts.app')

@section('title', 'Book Mentorship Session')
@section('description', 'Book your mentorship session with our experienced counselors.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Book Your Mentorship Session</h1>
                <p class="text-lg text-gray-600">Fill in your details and we'll assign the best mentor for your needs</p>
            </div>

            <form method="POST" action="{{ route('mentorship.store') }}" class="space-y-6">
                @csrf

                <!-- Session Duration -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Session Duration *
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer {{ request('duration') == '15min' ? 'border-primary bg-primary-50' : '' }}">
                            <input type="radio" name="session_duration" value="15min" class="mr-3" {{ request('duration') == '15min' || old('session_duration') == '15min' ? 'checked' : '' }} required>
                            <div>
                                <div class="font-semibold">15 Minutes</div>
                                <div class="text-sm text-gray-600">1,000 XAF</div>
                                <div class="text-xs text-gray-500">Quick consultation</div>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer {{ request('duration') == '30min' ? 'border-primary bg-primary-50' : '' }}">
                            <input type="radio" name="session_duration" value="30min" class="mr-3" {{ request('duration') == '30min' || old('session_duration') == '30min' ? 'checked' : '' }}>
                            <div>
                                <div class="font-semibold">30 Minutes</div>
                                <div class="text-sm text-gray-600">1,500 XAF</div>
                                <div class="text-xs text-gray-500">Standard session</div>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer {{ request('duration') == '1hour' ? 'border-primary bg-primary-50' : '' }}">
                            <input type="radio" name="session_duration" value="1hour" class="mr-3" {{ request('duration') == '1hour' || old('session_duration') == '1hour' ? 'checked' : '' }}>
                            <div>
                                <div class="font-semibold">1 Hour</div>
                                <div class="text-sm text-gray-600">2,500 XAF</div>
                                <div class="text-xs text-gray-500">Comprehensive session</div>
                            </div>
                        </label>
                    </div>
                    @error('session_duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Personal Information (Pre-filled from registration) -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <h3 class="text-sm font-medium text-blue-800 mb-3">Your Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                        <div>
                            <span class="font-medium text-blue-700">Full Name:</span>
                            <span class="text-blue-900">{{ auth()->user()->getDisplayName() }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-blue-700">WhatsApp:</span>
                            <span class="text-blue-900">{{ auth()->user()->whatsapp_number ?? 'Not set' }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-blue-700">Phone:</span>
                            <span class="text-blue-900">{{ auth()->user()->phone ?? 'Not set' }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-blue-700">Email:</span>
                            <span class="text-blue-900">{{ auth()->user()->email }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-blue-700">Academic Level:</span>
                            <span class="text-blue-900">{{ auth()->user()->getAcademicLevelText() }}</span>
                        </div>
                    </div>
                    <p class="text-xs text-blue-600 mt-2">This information was collected during registration and will be used for your booking.</p>
                </div>

                @if(empty(auth()->user()->whatsapp_number) && empty(auth()->user()->phone))
                <!-- Warning: No Contact Information -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Contact Information Required</h3>
                            <p class="text-sm text-yellow-700 mt-1">
                                You need to add your WhatsApp number or phone number to your profile before booking a mentorship session. 
                                <a href="{{ route('profile.edit') }}" class="font-medium underline hover:text-yellow-600">Update your profile here</a>.
                            </p>
                        </div>
                    </div>
                </div>
                @endif



                <!-- Session Topic -->
                <div>
                    <label for="session_topic" class="block text-sm font-medium text-gray-700 mb-2">
                        What would you like to discuss? (Optional)
                    </label>
                    <textarea 
                        id="session_topic" 
                        name="session_topic" 
                        rows="3" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        placeholder="e.g., Choosing the right university, Career planning, Application guidance, etc."
                    >{{ old('session_topic') }}</textarea>
                    @error('session_topic')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Notes -->
                <div>
                    <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-2">
                        Additional Notes (Optional)
                    </label>
                    <textarea 
                        id="additional_notes" 
                        name="additional_notes" 
                        rows="3" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        placeholder="Any additional information that would help us assign the right mentor..."
                    >{{ old('additional_notes') }}</textarea>
                    @error('additional_notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Information Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">What happens next?</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>We'll review your booking and assign the best mentor</li>
                                    <li>The mentor will contact you via WhatsApp within 24 hours</li>
                                    <li>You'll discuss payment and schedule the session</li>
                                    <li>Receive personalized guidance for your educational journey</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between pt-6">
                    <a href="{{ route('mentorship.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        ← Back
                    </a>
                    @if(empty(auth()->user()->whatsapp_number) && empty(auth()->user()->phone))
                        <button type="button" disabled class="bg-gray-400 cursor-not-allowed text-white font-bold py-2 px-6 rounded">
                            Add Contact Info First
                        </button>
                    @else
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded">
                            Book Session →
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-select duration if passed in URL
    const urlParams = new URLSearchParams(window.location.search);
    const duration = urlParams.get('duration');
    if (duration) {
        const radio = document.querySelector(`input[name="session_duration"][value="${duration}"]`);
        if (radio) {
            radio.checked = true;
            radio.closest('label').classList.add('border-primary', 'bg-primary-50');
        }
    }

    // Update styling when radio buttons change
    const radioButtons = document.querySelectorAll('input[name="session_duration"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove styling from all labels
            document.querySelectorAll('input[name="session_duration"]').forEach(r => {
                r.closest('label').classList.remove('border-primary', 'bg-primary-50');
            });
            // Add styling to selected label
            if (this.checked) {
                this.closest('label').classList.add('border-primary', 'bg-primary-50');
            }
        });
    });
});
</script>
@endsection 