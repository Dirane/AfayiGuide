<x-guest-layout>
    <x-slot name="title">Request Password Reset</x-slot>
    <x-slot name="description">Request a password reset using your email or WhatsApp number</x-slot>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="mx-auto h-12 w-12 flex items-center justify-center">
                <img src="{{ asset('images/Logo_afayiguide.png') }}" alt="AfayiGuide Logo" class="h-12 w-12">
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Request Password Reset
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your email or WhatsApp number to request a password reset
            </p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password-reset-request.submit') }}">
            @csrf
            
            <div class="space-y-4">
                <!-- Contact Method Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        How would you like to receive your reset information?
                    </label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="contact_method" value="email" class="mr-2" 
                                   {{ old('contact_method') === 'email' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">Email</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="contact_method" value="whatsapp" class="mr-2"
                                   {{ old('contact_method') === 'whatsapp' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">WhatsApp</span>
                        </label>
                    </div>
                    @error('contact_method')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div id="email-field" class="hidden">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <input id="email" name="email" type="email" autocomplete="email" 
                           value="{{ old('email') }}"
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Enter your email address">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- WhatsApp Field -->
                <div id="whatsapp-field" class="hidden">
                    <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">
                        WhatsApp Number
                    </label>
                    <input id="whatsapp_number" name="whatsapp_number" type="text" 
                           value="{{ old('whatsapp_number') }}"
                           class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                           placeholder="Enter your WhatsApp number">
                    @error('whatsapp_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Request Password Reset
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-sm text-primary hover:text-primary-dark">
                    Back to Login
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const emailRadio = document.querySelector('input[name="contact_method"][value="email"]');
    const whatsappRadio = document.querySelector('input[name="contact_method"][value="whatsapp"]');
    const emailField = document.getElementById('email-field');
    const whatsappField = document.getElementById('whatsapp-field');

    function toggleFields() {
        if (emailRadio.checked) {
            emailField.classList.remove('hidden');
            whatsappField.classList.add('hidden');
            document.getElementById('email').required = true;
            document.getElementById('whatsapp_number').required = false;
        } else if (whatsappRadio.checked) {
            emailField.classList.add('hidden');
            whatsappField.classList.remove('hidden');
            document.getElementById('email').required = false;
            document.getElementById('whatsapp_number').required = true;
        }
    }

    emailRadio.addEventListener('change', toggleFields);
    whatsappRadio.addEventListener('change', toggleFields);
    
    // Initialize on page load
    toggleFields();
});
</script>
</x-guest-layout>
