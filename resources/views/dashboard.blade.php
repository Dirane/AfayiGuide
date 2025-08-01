@extends('layouts.app')

@section('title', 'Dashboard')
@section('description', 'Your personal dashboard on AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-xl text-gray-200">Your personal dashboard on AfayiGuide</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Quick Actions -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('pathfinder.index') }}" class="block w-full btn-primary text-center">
                        Take PathFinder Assessment
                    </a>
                    <a href="{{ route('programs.index') }}" class="block w-full btn-outline text-center">
                        Browse Programs
                    </a>
                    <a href="{{ route('opportunities.index') }}" class="block w-full btn-outline text-center">
                        View Opportunities
                    </a>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Profile Information</h3>
                <div class="space-y-2 text-sm">
                    <div><span class="font-medium">Name:</span> {{ auth()->user()->name }}</div>
                    <div><span class="font-medium">Email:</span> {{ auth()->user()->email }}</div>
                    <div><span class="font-medium">Role:</span> {{ ucfirst(auth()->user()->role) }}</div>
                    @if(auth()->user()->phone)
                        <div><span class="font-medium">Phone:</span> {{ auth()->user()->phone }}</div>
                    @endif
                </div>
                <a href="{{ route('profile.edit') }}" class="btn-outline mt-4 inline-block">Edit Profile</a>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Activity</h3>
                <div class="text-gray-600 text-sm">
                    <p>No recent activity to display.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 