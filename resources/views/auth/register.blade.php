<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create your account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Join AfayiGuide to start your educational journey
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name *</label>
                    <input id="full_name" name="full_name" type="text" required 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                           value="{{ old('full_name') }}" placeholder="Enter your full name">
                    @error('full_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username/Display Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Username *</label>
                    <input id="name" name="name" type="text" required 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                           value="{{ old('name') }}" placeholder="Choose a username">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address *</label>
                    <input id="email" name="email" type="email" required 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                           value="{{ old('email') }}" placeholder="Enter your email address">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- WhatsApp Number -->
                <div>
                    <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">WhatsApp Number *</label>
                    <input id="whatsapp_number" name="whatsapp_number" type="tel" required 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                           value="{{ old('whatsapp_number') }}" placeholder="e.g., +237 6XX XXX XXX">
                    <p class="mt-1 text-xs text-gray-500">This will be used for mentorship sessions</p>
                    @error('whatsapp_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Academic Level -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Academic Level *</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="academic_level" value="advanced_level" 
                                   class="mr-3" {{ old('academic_level') == 'advanced_level' ? 'checked' : '' }} required>
                            <span class="text-sm text-gray-700">Advanced Level Holder</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="academic_level" value="hnd" 
                                   class="mr-3" {{ old('academic_level') == 'hnd' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">HND Holder</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="academic_level" value="degree" 
                                   class="mr-3" {{ old('academic_level') == 'degree' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">Degree Holder</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="academic_level" value="other" 
                                   class="mr-3" {{ old('academic_level') == 'other' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">Other</span>
                        </label>
                    </div>
                    @error('academic_level')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Interests -->
                <div>
                    <label for="interests" class="block text-sm font-medium text-gray-700">Areas of Interest (Optional)</label>
                    <textarea id="interests" name="interests" rows="3" 
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                              placeholder="e.g., Computer Science, Business, Medicine, Engineering...">{{ old('interests') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">This helps us provide better recommendations</p>
                    @error('interests')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                    <input id="password" name="password" type="password" required 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                           placeholder="Create a strong password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password *</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                           placeholder="Confirm your password">
                    @error('password_confirmation')
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
                            <h3 class="text-sm font-medium text-blue-800">Why we collect this information</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>WhatsApp number for mentorship sessions</li>
                                    <li>Academic level for personalized recommendations</li>
                                    <li>Interests to suggest relevant programs</li>
                                    <li>All information is kept secure and private</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-primary hover:text-primary-dark underline" href="{{ route('login') }}">
                        Already have an account?
                    </a>

                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded-md transition-colors">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
