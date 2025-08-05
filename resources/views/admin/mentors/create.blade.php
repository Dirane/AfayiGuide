@extends('layouts.admin')

@section('title', 'Add New Mentor')
@section('description', 'Add a new mentor to the AfayiGuide platform')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.mentors.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" value="Full Name" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" value="Email" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password" value="Password" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" value="Confirm Password" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="phone" value="Phone Number" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="location" value="Location" />
                                <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location')" />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="expertise" value="Area of Expertise" />
                                <x-text-input id="expertise" name="expertise" type="text" class="mt-1 block w-full" :value="old('expertise')" placeholder="e.g., Computer Science, Business, Medicine" required />
                                <x-input-error :messages="$errors->get('expertise')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="experience_years" value="Years of Experience" />
                                <x-text-input id="experience_years" name="experience_years" type="number" class="mt-1 block w-full" :value="old('experience_years')" min="0" required />
                                <x-input-error :messages="$errors->get('experience_years')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="hourly_rate" value="Hourly Rate (XAF)" />
                                <x-text-input id="hourly_rate" name="hourly_rate" type="number" class="mt-1 block w-full" :value="old('hourly_rate')" min="0" step="1000" required />
                                <x-input-error :messages="$errors->get('hourly_rate')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="bio" value="Bio" />
                            <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Tell us about the mentor's background, qualifications, and teaching approach...">{{ old('bio') }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="profile_picture" value="Profile Picture" />
                            <input type="file" id="profile_picture" name="profile_picture" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*" />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>

                        <div class="flex items-center">
                            <input id="is_active" name="is_active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="1" {{ old('is_active') ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Active Mentor
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.mentors.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </a>
                            <x-primary-button>
                                {{ __('Create Mentor') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 