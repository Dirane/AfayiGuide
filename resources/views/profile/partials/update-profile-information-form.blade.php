<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and personal details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Basic Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="name" :value="__('Username')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="full_name" :value="__('Full Name')" />
                <x-text-input id="full_name" name="full_name" type="text" class="mt-1 block w-full" :value="old('full_name', $user->full_name)" required autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
            </div>
        </div>

        <!-- Contact Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-primary hover:text-primary-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div>
                <x-input-label for="whatsapp_number" :value="__('WhatsApp Number')" />
                <x-text-input id="whatsapp_number" name="whatsapp_number" type="text" class="mt-1 block w-full" :value="old('whatsapp_number', $user->whatsapp_number)" required placeholder="+237 6XX XXX XXX" />
                <x-input-error class="mt-2" :messages="$errors->get('whatsapp_number')" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="phone" :value="__('Phone Number (Optional)')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" placeholder="+237 XXX XXX XXX" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div>
                <x-input-label for="academic_level" :value="__('Academic Level')" />
                <select id="academic_level" name="academic_level" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm" required>
                    <option value="">Select Academic Level</option>
                    <option value="advanced_level" {{ old('academic_level', $user->academic_level) == 'advanced_level' ? 'selected' : '' }}>Advanced Level Holder</option>
                    <option value="hnd" {{ old('academic_level', $user->academic_level) == 'hnd' ? 'selected' : '' }}>HND Holder</option>
                    <option value="degree" {{ old('academic_level', $user->academic_level) == 'degree' ? 'selected' : '' }}>Degree Holder</option>
                    <option value="other" {{ old('academic_level', $user->academic_level) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('academic_level')" />
            </div>
        </div>

        <!-- Personal Information -->
        <div>
            <x-input-label for="interests" :value="__('Interests & Career Goals')" />
            <textarea id="interests" name="interests" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm" placeholder="Tell us about your interests, career goals, or any specific areas you'd like to focus on...">{{ old('interests', $user->interests) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('interests')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio & About Me')" />
            <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm" placeholder="Tell us a bit about yourself, your background, and what you're passionate about...">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <!-- Additional Fields for Different User Types -->
        @if($user->isMentor())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="expertise" :value="__('Areas of Expertise')" />
                <textarea id="expertise" name="expertise" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm" placeholder="List your areas of expertise, specializations, or skills...">{{ old('expertise', $user->expertise) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('expertise')" />
            </div>

            <div>
                <x-input-label for="experience_years" :value="__('Years of Experience')" />
                <x-text-input id="experience_years" name="experience_years" type="number" min="0" max="50" class="mt-1 block w-full" :value="old('experience_years', $user->experience_years)" placeholder="5" />
                <x-input-error class="mt-2" :messages="$errors->get('experience_years')" />
            </div>
        </div>

        <div>
            <x-input-label for="hourly_rate" :value="__('Hourly Rate (Optional)')" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">XAF</span>
                </div>
                <x-text-input id="hourly_rate" name="hourly_rate" type="number" min="0" step="100" class="pl-12" :value="old('hourly_rate', $user->hourly_rate)" placeholder="5000" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('hourly_rate')" />
        </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('Profile updated successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
