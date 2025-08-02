<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AfayiGuide') }} - Register</title>
    
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
        .step-indicator {
            transition: all 0.3s ease;
        }
        .step-indicator.active {
            background-color: #3B82F6;
            color: white;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Left Side - Registration Form -->
        <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-md w-full">
                <!-- Header -->
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-block">
                        <h1 class="text-3xl font-bold text-primary mb-2">AfayiGuide</h1>
                    </a>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Create Your Account</h2>
                    <p class="text-gray-600">Join our community and start your educational journey</p>
                </div>

                <!-- Registration Form -->
                <div class="bg-white rounded-2xl card-shadow p-8">
                    <form method="POST" action="{{ route('register') }}" id="registrationForm">
                        @csrf

                        <!-- Step 1: Basic Information -->
                        <div id="step1" class="step-content">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Student Information</h3>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                               placeholder="Enter your full name">
                                        @error('name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                               placeholder="Enter your email address">
                                        @error('email')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number (Optional)</label>
                                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                               placeholder="Enter your phone number">
                                        @error('phone')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location (Optional)</label>
                                        <input type="text" name="location" id="location" value="{{ old('location') }}" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                               placeholder="e.g., Yaoundé, Cameroon">
                                        @error('location')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <button type="button" onclick="nextStep()" class="btn-primary px-6 py-3">
                                    Next Step
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Password & Final -->
                        <div id="step2" class="step-content hidden">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Create Password</h3>
                                <p class="text-gray-600 mb-6">Set a strong password for your account</p>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                        <input type="password" name="password" id="password" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                               placeholder="Create a strong password">
                                        @error('password')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:border-primary focus:ring-2 focus:ring-primary/20"
                                               placeholder="Confirm your password">
                                        @error('password_confirmation')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <button type="button" onclick="prevStep()" class="btn-outline px-6 py-3">
                                    Previous
                                </button>
                                <button type="submit" class="btn-primary px-6 py-3">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Step Indicators -->
                    <div class="flex justify-center mt-8">
                        <div class="flex space-x-2">
                            <div class="step-indicator w-3 h-3 rounded-full bg-primary"></div>
                            <div class="step-indicator w-3 h-3 rounded-full bg-gray-300"></div>
                        </div>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary hover:text-primary-800 font-medium">
                            Sign in here
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
                    <h1 class="text-4xl font-bold mb-4">Welcome to AfayiGuide</h1>
                    <p class="text-xl text-blue-100 mb-8">Your pathway to educational success in Cameroon</p>
                </div>
                
                <div class="grid grid-cols-1 gap-6 max-w-md mx-auto">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">🏫</span>
                        </div>
                        <div class="text-left">
                            <h3 class="font-semibold">Browse Schools</h3>
                            <p class="text-blue-100 text-sm">Find the perfect institution for your studies</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">💼</span>
                        </div>
                        <div class="text-left">
                            <h3 class="font-semibold">Discover Opportunities</h3>
                            <p class="text-blue-100 text-sm">Access scholarships and career opportunities</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <span class="text-2xl">📊</span>
                        </div>
                        <div class="text-left">
                            <h3 class="font-semibold">PathFinder Assessment</h3>
                            <p class="text-blue-100 text-sm">Get personalized educational guidance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 2;

        function nextStep() {
            if (currentStep < totalSteps) {
                // Validate current step
                if (!validateCurrentStep()) {
                    return;
                }
                
                document.getElementById(`step${currentStep}`).classList.add('hidden');
                currentStep++;
                document.getElementById(`step${currentStep}`).classList.remove('hidden');
                updateStepIndicators();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).classList.add('hidden');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.remove('hidden');
                updateStepIndicators();
            }
        }

        function validateCurrentStep() {
            const currentStepElement = document.getElementById(`step${currentStep}`);
            const requiredFields = currentStepElement.querySelectorAll('input[required], textarea[required]');
            
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    field.focus();
                    return false;
                }
            }
            
            return true;
        }

        function updateStepIndicators() {
            const indicators = document.querySelectorAll('.step-indicator');
            indicators.forEach((indicator, index) => {
                if (index < currentStep) {
                    indicator.classList.add('bg-primary');
                    indicator.classList.remove('bg-gray-300');
                } else {
                    indicator.classList.remove('bg-primary');
                    indicator.classList.add('bg-gray-300');
                }
            });
        }

        // Initialize step indicators
        updateStepIndicators();
    </script>
</body>
</html>
