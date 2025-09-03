<x-guest-layout>
    <x-slot name="title">Request Submitted</x-slot>
    <x-slot name="description">Your password reset request has been submitted</x-slot>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto h-12 w-12 flex items-center justify-center">
                <img src="{{ asset('images/Logo_afayiguide.png') }}" alt="AfayiGuide Logo" class="h-12 w-12">
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Request Submitted
            </h2>
            <div class="mt-4">
                <div class="bg-green-50 border border-green-200 rounded-md p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">
                                Password Reset Request Received
                            </h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Your password reset request has been submitted successfully. Our admin team will review your request and process it very soon.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">
                        What happens next?
                    </h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <ul class="list-disc list-inside space-y-1">
                            <li>Our admin team will verify your account</li>
                            <li>Your password will be reset to a default value</li>
                            <li>You'll receive a notification with your new login credentials</li>
                            <li>You can then log in and change your password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-primary hover:text-primary-dark">
                Back to Login
            </a>
        </div>
    </div>
</div>
</x-guest-layout>
