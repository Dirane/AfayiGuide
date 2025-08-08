<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard - AfayiGuide')</title>
    <meta name="description" content="@yield('description', 'Admin dashboard for AfayiGuide platform management.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-primary border-b border-primary-800" x-data="{ mobileMenuOpen: false, userMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-white text-xl font-bold">
                                AfayiGuide Admin
                            </a>
                        </div>

                        <!-- Desktop Navigation -->
                        <div class="hidden md:ml-6 md:flex md:space-x-8">
                            <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.schools.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Schools
                            </a>
                            
                            <a href="{{ route('admin.opportunities.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Opportunities
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Users
                            </a>
                            <a href="{{ route('admin.mentors.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Mentors
                            </a>
                            <a href="{{ route('admin.assessments.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Assessments
                            </a>
                            <a href="{{ route('admin.mentorship-bookings.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Mentorship
                            </a>
                                            <a href="{{ route('admin.admission-applications.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                    Application Requests
                </a>
                            <a href="{{ route('admin.settings.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">
                                Settings
                            </a>
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center">
                        <div class="relative">
                            <button @click="userMenuOpen = !userMenuOpen" class="flex items-center text-white hover:text-accent transition-colors">
                                <div class="flex-shrink-0 h-8 w-8 bg-accent rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <span class="ml-2 text-sm font-medium hidden sm:block">{{ auth()->user()->name }}</span>
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="userMenuOpen" @click.away="userMenuOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    View Site
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-accent transition-colors p-2 rounded-md">
                            <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-primary-800 border-t border-primary-700">
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Dashboard</a>
                    <a href="{{ route('admin.schools.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Schools</a>
                    <a href="{{ route('admin.opportunities.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Opportunities</a>
                    <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Users</a>
                    <a href="{{ route('admin.mentors.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Mentors</a>
                    <a href="{{ route('admin.assessments.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Assessments</a>
                    <a href="{{ route('admin.mentorship-bookings.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Mentorship</a>
                                                <a href="{{ route('admin.admission-applications.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Application Requests</a>
                    <a href="{{ route('admin.settings.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Settings</a>
                    
                    <div class="border-t border-primary-700 pt-2 mt-2">
                        <a href="{{ route('home') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">View Site</a>
                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @if(session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @livewireScripts
</body>
</html> 