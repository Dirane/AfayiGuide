<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AfayiGuide') }} - @yield('title', 'Your Path to Success')</title>
    <meta name="description" content="@yield('description', 'Supporting GCE A-Level and HND graduates in Cameroon transition to university or degree programs.')">
    
    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#0D1F3C">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="AfayiGuide">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/icon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/icon-16x16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}" class="text-white font-bold text-xl">
                            AfayiGuide
                        </a>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('programs.index') }}" class="text-white hover:text-accent transition-colors">Programs</a>
                    <a href="{{ route('mentorship.index') }}" class="text-white hover:text-accent transition-colors">Mentorship</a>
                    <a href="{{ route('opportunities.index') }}" class="text-white hover:text-accent transition-colors">Opportunities</a>
                    <a href="{{ route('pathfinder.index') }}" class="text-white hover:text-accent transition-colors">PathFinder</a>
                    
                    @auth
                        <div class="relative" x-data="{ userMenuOpen: false }">
                            <button @click="userMenuOpen = !userMenuOpen" class="text-white hover:text-accent transition-colors">
                                {{ Auth::user()->name }}
                            </button>
                            <div x-show="userMenuOpen" @click.away="userMenuOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-accent">Login</a>
                    @endauth
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen" class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-primary-800">
                <a href="{{ route('programs.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">Programs</a>
                <a href="{{ route('mentorship.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">Mentorship</a>
                <a href="{{ route('opportunities.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">Opportunities</a>
                <a href="{{ route('pathfinder.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">PathFinder</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-white hover:text-accent transition-colors">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">AfayiGuide</h3>
                    <p class="text-gray-300">Supporting GCE A-Level and HND graduates in Cameroon transition to university or degree programs.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="{{ route('programs.index') }}" class="hover:text-accent transition-colors">Program Finder</a></li>
                        <li><a href="{{ route('mentorship.index') }}" class="hover:text-accent transition-colors">Mentorship</a></li>
                        <li><a href="{{ route('pathfinder.index') }}" class="hover:text-accent transition-colors">PathFinder</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="{{ route('opportunities.index') }}" class="hover:text-accent transition-colors">Opportunities</a></li>
                        <li><a href="#" class="hover:text-accent transition-colors">Scholarships</a></li>
                        <li><a href="#" class="hover:text-accent transition-colors">Career Guide</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>Email: info@afayiguide.com</li>
                        <li>Phone: +237 XXX XXX XXX</li>
                        <li>Address: Yaoundé, Cameroon</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-primary-600 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} AfayiGuide. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
    
    <!-- PWA Service Worker -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('SW registered: ', registration);
                    })
                    .catch(function(registrationError) {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html> 