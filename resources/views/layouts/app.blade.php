<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'AfayiGuide - Your Educational Pathway')</title>
    <meta name="description" content="@yield('description', 'Discover schools and opportunities in Cameroon. Take the PathFinder assessment to get personalized guidance.')">

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#1f2937">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="AfayiGuide">
    <meta name="msapplication-TileColor" content="#1f2937">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- PWA Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/icon-16x16.png">
    <link rel="apple-touch-icon" href="/icons/icon-192x192.png">
    <link rel="manifest" href="/manifest.json">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-primary border-b border-primary-800" x-data="{ mobileMenuOpen: false, userMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-white text-xl font-bold">AfayiGuide</a>
                        </div>
                        <!-- Desktop Navigation -->
                        <div class="hidden md:ml-6 md:flex md:space-x-8">
                            <a href="{{ route('home') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            @auth
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">{{ auth()->user()->getDashboardTitle() }}</a>
                                @endif
                                @if(auth()->user()->canViewSchools()) <a href="{{ route('schools.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Schools</a> @endif
                                @if(auth()->user()->canViewOpportunities()) <a href="{{ route('opportunities.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Opportunities</a> @endif
                                @if(auth()->user()->canUsePathfinder()) <a href="{{ route('pathfinder.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">PathFinder</a> @endif
                                @if(auth()->user()->canBookMentorship()) <a href="{{ route('mentorship.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Mentorship</a> @endif
                                @if(auth()->user()->isStudent()) <a href="{{ route('admission-applications.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">My Applications</a> @endif
                                
                            @else
                                <a href="{{ route('schools.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Schools</a>
                                <a href="{{ route('opportunities.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Opportunities</a>
                                <a href="{{ route('pathfinder.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">PathFinder</a>
                                <a href="{{ route('mentorship.index') }}" class="text-white hover:text-accent transition-colors px-3 py-2 rounded-md text-sm font-medium">Mentorship</a>
                            @endauth
                        </div>
                    </div>
                    <!-- User Menu -->
                    <div class="flex items-center">
                        @auth
                            <div class="relative">
                                <button @click="userMenuOpen = !userMenuOpen" class="flex items-center text-white hover:text-accent transition-colors">
                                    <div class="flex-shrink-0 h-8 w-8 bg-accent rounded-full flex items-center justify-center">
                                        <span class="text-white text-sm font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                    <span class="ml-2 text-sm font-medium hidden sm:block">{{ auth()->user()->name }}</span>
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="userMenuOpen" @click.away="userMenuOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Dashboard</a>
                                    @else
                                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ auth()->user()->getDashboardTitle() }}</a>
                                    @endif
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button></form>
                                </div>
                            </div>
                        @else
                            <div class="hidden md:flex items-center space-x-4">
                                <a href="{{ route('register') }}" class="text-white hover:text-accent transition-colors">Register</a>
                                <a href="{{ route('login') }}" class="btn-accent">Login</a>
                            </div>
                        @endauth
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
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Home</a>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Admin Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">{{ auth()->user()->getDashboardTitle() }}</a>
                        @endif
                        @if(auth()->user()->canViewSchools()) <a href="{{ route('schools.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Schools</a> @endif
                        @if(auth()->user()->canViewOpportunities()) <a href="{{ route('opportunities.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Opportunities</a> @endif
                        @if(auth()->user()->canUsePathfinder()) <a href="{{ route('pathfinder.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">PathFinder</a> @endif
                        @if(auth()->user()->canBookMentorship()) <a href="{{ route('mentorship.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Mentorship</a> @endif
                        @if(auth()->user()->isStudent()) <a href="{{ route('admission-applications.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">My Applications</a> @endif
                        
                        <div class="border-t border-primary-700 pt-2 mt-2">
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full text-left px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Logout</button></form>
                        </div>
                    @else
                        <a href="{{ route('schools.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Schools</a>
                        <a href="{{ route('opportunities.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Opportunities</a>
                        <a href="{{ route('pathfinder.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">PathFinder</a>
                        <a href="{{ route('mentorship.index') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Mentorship</a>
                        <div class="border-t border-primary-700 pt-2 mt-2">
                            <a href="{{ route('register') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Register</a>
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-white hover:text-accent transition-colors rounded-md">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <main>@yield('content')</main>
        <!-- Footer -->
        <footer class="bg-primary text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div><h3 class="text-lg font-semibold mb-4">AfayiGuide</h3><p class="text-gray-300 text-sm">Your pathway to educational success in Cameroon.</p></div>
                    <div><h4 class="font-semibold mb-4">Quick Links</h4><ul class="space-y-2 text-sm text-gray-300"><li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li><li><a href="{{ route('schools.index') }}" class="hover:text-white">Schools</a></li><li><a href="{{ route('opportunities.index') }}" class="hover:text-white">Opportunities</a></li></ul></div>
                    <div><h4 class="font-semibold mb-4">Tools</h4><ul class="space-y-2 text-sm text-gray-300">
                        @auth
                            @if(auth()->user()->canUsePathfinder())
                                <li><a href="{{ route('pathfinder.index') }}" class="hover:text-white">PathFinder</a></li>
                            @endif
                            @if(auth()->user()->canBookMentorship())
                                <li><a href="{{ route('mentorship.index') }}" class="hover:text-white">Mentorship</a></li>
                            @endif
                        @else
                            <li><a href="{{ route('pathfinder.index') }}" class="hover:text-white">PathFinder</a></li>
                            <li><a href="{{ route('mentorship.index') }}" class="hover:text-white">Mentorship</a></li>
                        @endauth
                    </ul></div>
                    <div><h4 class="font-semibold mb-4">Account</h4><ul class="space-y-2 text-sm text-gray-300">
                        @auth
                            @if(auth()->user()->isAdmin())
                                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-white">Admin Dashboard</a></li>
                            @else
                                <li><a href="{{ route('dashboard') }}" class="hover:text-white">{{ auth()->user()->getDashboardTitle() }}</a></li>
                            @endif
                            <li><a href="{{ route('profile.edit') }}" class="hover:text-white">Profile</a></li>
                            <li><form method="POST" action="{{ route('logout') }}" class="inline">@csrf<button type="submit" class="hover:text-white">Logout</button></form></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-white">Login</a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-white">Register</a></li>
                        @endauth
                    </ul></div>
                </div>
                <div class="border-t border-primary-800 mt-8 pt-8 text-center text-sm text-gray-300"><p>&copy; {{ date('Y') }} AfayiGuide. All rights reserved.</p></div>
            </div>
        </footer>
    </div>
    @livewireScripts
    
    <!-- PWA Service Worker Registration -->
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
        
        // Add to home screen prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            // You can show a custom install prompt here
        });
    </script>
</body>
</html> 