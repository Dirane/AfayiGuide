<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome to AfayiGuide</h2>
        <p class="text-gray-600">Your gateway to the next level starts here</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Logo Placeholder -->
        <div class="text-center mb-6">
            <div class="flex justify-center mb-2">
                <img src="{{ asset('images/Logo_afayiguide.png') }}" alt="AfayiGuide Logo" class="w-32 h-32 mx-auto drop-shadow-lg bg-white rounded-full border-4 border-primary p-2">
            </div>
            <p class="text-lg font-bold text-primary">AfayiGuide</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
            <x-text-input id="email" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200" 
                         type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                         placeholder="Enter your email address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
            <x-text-input id="password" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         type="password" name="password" required autocomplete="current-password" 
                         placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>


        </div>

        <!-- Login Button -->
        <div>
            <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                {{ __('Sign In') }}
            </button>
        </div>

        <!-- Register Link -->
        <div class="text-center space-y-2">
            <p class="text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="font-medium text-primary hover:text-primary-800 underline">
                    {{ __('Register here') }}
                </a>
            </p>
            <p class="text-sm text-gray-600">
                {{ __("Forgot your password?") }}
                <a href="{{ route('password-reset-request') }}" class="font-medium text-primary hover:text-primary-800 underline">
                    {{ __('Request password reset') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
