@extends('layouts.app')

@section('title', 'Profile Settings')
@section('description', 'Manage your profile information, password, and account settings')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Profile Settings</h1>
            <p class="mt-2 text-gray-600">Manage your account information and preferences</p>
        </div>

        <div class="space-y-8">
            <!-- Profile Information Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Profile Picture Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-picture-form')
                    </div>
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Account Security Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.account-security-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
