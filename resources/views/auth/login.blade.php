<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AfayiGuide') }} - Login</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0D1F3C 0%, #1E3A8A 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Left Side - Login Form -->
        <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-md w-full">
                <!-- Header -->
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-block">
                        <h1 class="text-3xl font-bold text-primary mb-2">AfayiGuide</h1>
                    </a>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Welcome Back</h2>
                    <p class="text-gray-600">Sign in to continue your educational journey</p>
                </div>

                <!-- Login Form -->
                <div class="bg-white rounded-2xl card-shadow p-8">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                   placeholder="Enter your email address">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" name="password" id="password" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                   placeholder="Enter your password">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" 
                                       class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-sm text-primary hover:text-primary-800 font-medium">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button type="submit" class="w-full btn-primary py-3">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <!-- Demo Account Info -->
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h3 class="text-sm font-medium text-blue-900 mb-2">Demo Account</h3>
                        <div class="text-xs text-blue-700 space-y-1">
                            <p><strong>Student:</strong> test@example.com / password</p>
                            <p><strong>Admin:</strong> admin@example.com / password</p>
                        </div>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-6">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-primary hover:text-primary-800 font-medium">
                            Register here
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side - Hero Section -->
        <div class="hidden lg:flex lg:w-1/2 gradient-bg items-center justify-center px-12">
            <div class="text-center text-white">
                <div class="mb-8">
                    <div class="text-6xl mb-4">🎓</div>
                    <h1 class="text-4xl font-bold mb-4">Welcome Back to AfayiGuide</h1>
                    <p class="text-xl text-blue-100 mb-8">Continue your educational journey with us</p>
                </div>
                
                <div class="grid grid-cols-1 gap-6 max-w-md mx-auto">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">📚</span>
                        </div>
                        <div class="text-left">
                            <h3 class="font-semibold">Access Resources</h3>
                            <p class="text-blue-100 text-sm">Browse programs and educational materials</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <div class="text-left">
                            <h3 class="font-semibold">Track Progress</h3>
                            <p class="text-blue-100 text-sm">Monitor your learning journey</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">💬</span>
                        </div>
                        <div class="text-left">
                            <h3 class="font-semibold">Connect</h3>
                            <p class="text-blue-100 text-sm">Engage with mentors and peers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
