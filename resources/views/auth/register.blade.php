<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Create your account</h2>
        <p class="text-gray-600">Join AfayiGuide to start your journey to the next level</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Logo Placeholder -->
        <div class="text-center mb-6">
            <div class="flex justify-center mb-2">
                <img src="{{ asset('images/Logo_afayiguide.png') }}" alt="AfayiGuide Logo" class="w-32 h-32 mx-auto drop-shadow-lg bg-white rounded-full border-4 border-primary p-2">
            </div>
            <p class="text-lg font-bold text-primary">AfayiGuide</p>
        </div>

        <!-- Full Name -->
        <div>
            <x-input-label for="full_name" :value="__('Full Name')" class="text-gray-700 font-medium" />
            <x-text-input id="full_name" name="full_name" type="text" required 
                         class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         value="{{ old('full_name') }}" placeholder="Enter your full name" />
            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
        </div>

        <!-- Username/Display Name -->
        <div>
            <x-input-label for="name" :value="__('Username')" class="text-gray-700 font-medium" />
            <x-text-input id="name" name="name" type="text" required 
                         class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         value="{{ old('name') }}" placeholder="Choose a username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
            <x-text-input id="email" name="email" type="email" required 
                         class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         value="{{ old('email') }}" placeholder="Enter your email address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- WhatsApp Number -->
        <div>
            <x-input-label for="whatsapp_number" :value="__('WhatsApp Number')" class="text-gray-700 font-medium" />
            <x-text-input id="whatsapp_number" name="whatsapp_number" type="tel" required 
                         class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         value="{{ old('whatsapp_number') }}" placeholder="e.g., +237 6XX XXX XXX" />
            <p class="mt-1 text-xs text-gray-500">This will be used for mentorship sessions</p>
            <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-2" />
        </div>

        <!-- Academic Level -->
        <div>
            <x-input-label for="academic_level" :value="__('Academic Level')" class="text-gray-700 font-medium" />
            <div class="mt-1 grid grid-cols-1 sm:grid-cols-2 gap-2">
                <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                    <input type="radio" name="academic_level" value="advanced_level" 
                           class="mr-2 text-primary focus:ring-primary" {{ old('academic_level') == 'advanced_level' ? 'checked' : '' }} required>
                    <span class="text-sm text-gray-700">Advanced Level</span>
                </label>
                <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                    <input type="radio" name="academic_level" value="hnd" 
                           class="mr-2 text-primary focus:ring-primary" {{ old('academic_level') == 'hnd' ? 'checked' : '' }}>
                    <span class="text-sm text-gray-700">HND Holder</span>
                </label>
                <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                    <input type="radio" name="academic_level" value="degree" 
                           class="mr-2 text-primary focus:ring-primary" {{ old('academic_level') == 'degree' ? 'checked' : '' }}>
                    <span class="text-sm text-gray-700">Degree Holder</span>
                </label>
                <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                    <input type="radio" name="academic_level" value="other" 
                           class="mr-2 text-primary focus:ring-primary" {{ old('academic_level') == 'other' ? 'checked' : '' }}>
                    <span class="text-sm text-gray-700">Other</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('academic_level')" class="mt-2" />
        </div>

        <!-- Interests -->
        <div>
            <x-input-label for="interests" :value="__('Areas of Interest (Optional)')" class="text-gray-700 font-medium" />
            <textarea id="interests" name="interests" rows="3" 
                      class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                      placeholder="e.g., Computer Science, Business, Medicine, Engineering...">{{ old('interests') }}</textarea>
            <p class="mt-1 text-xs text-gray-500">This helps us provide better recommendations</p>
            <x-input-error :messages="$errors->get('interests')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
            <x-text-input id="password" name="password" type="password" required 
                         class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         placeholder="Create a strong password" />
            <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" required 
                         class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                         placeholder="Confirm your password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms and Conditions -->
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="terms" name="terms" type="checkbox" required
                       class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary text-primary"
                       {{ old('terms') ? 'checked' : '' }}>
            </div>
            <div class="ml-3 text-sm">
                <label for="terms" class="font-medium text-gray-700">I agree to the</label>
                <a href="#" class="text-primary hover:text-primary-800 underline">Terms and Conditions</a>
                <span class="text-gray-700"> and </span>
                <a href="#" class="text-primary hover:text-primary-800 underline">Privacy Policy</a>
            </div>
        </div>
        <x-input-error :messages="$errors->get('terms')" class="mt-2" />

        <!-- Register Button -->
        <div>
            <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Create Account
            </button>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-primary hover:text-primary-800 underline">
                    Sign in here
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
