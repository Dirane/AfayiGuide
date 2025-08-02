@extends('layouts.app')

@section('title', $program->name . ' - Program Details')
@section('description', $program->description)

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $program->name }}</h1>
                <p class="text-xl text-gray-200">{{ $program->institution }} • {{ $program->location }}</p>
            </div>
        </div>
    </div>

    <!-- Program Details -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- About Program -->
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About This Program</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $program->description }}</p>
                </div>

                <!-- Program Information -->
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Program Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <span class="font-semibold text-gray-900">Institution:</span>
                                <p class="text-gray-700">{{ $program->institution }}</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">Location:</span>
                                <p class="text-gray-700">{{ $program->location }}</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">Field of Study:</span>
                                <p class="text-gray-700">{{ $program->field_of_study }}</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">Level:</span>
                                <p class="text-gray-700">{{ ucfirst($program->level) }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <span class="font-semibold text-gray-900">Duration:</span>
                                <p class="text-gray-700">{{ $program->duration_months }} months</p>
                            </div>
                            @if($program->tuition_fee)
                                <div>
                                    <span class="font-semibold text-gray-900">Tuition Fee:</span>
                                    <p class="text-gray-700">{{ number_format($program->tuition_fee) }} {{ $program->currency }}</p>
                                </div>
                            @endif
                            @if($program->application_deadline)
                                <div>
                                    <span class="font-semibold text-gray-900">Application Deadline:</span>
                                    <p class="text-gray-700">{{ $program->application_deadline }}</p>
                                </div>
                            @endif
                            @if($program->start_date)
                                <div>
                                    <span class="font-semibold text-gray-900">Start Date:</span>
                                    <p class="text-gray-700">{{ $program->start_date }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Requirements -->
                @if($program->requirements && count($program->requirements) > 0)
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Admission Requirements</h2>
                    <div class="space-y-3">
                        @foreach($program->requirements as $requirement)
                            <div class="flex items-start space-x-3">
                                <div class="text-accent mt-1">•</div>
                                <div class="text-gray-700">{{ $requirement }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Curriculum -->
                @if($program->curriculum && count($program->curriculum) > 0)
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Curriculum</h2>
                    <div class="space-y-3">
                        @foreach($program->curriculum as $course)
                            <div class="flex items-start space-x-3">
                                <div class="text-accent mt-1">📚</div>
                                <div class="text-gray-700">{{ $course }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Program Status -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Program Status</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Status:</span>
                            @if($program->is_active)
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">
                                    Active
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">
                                    Inactive
                                </span>
                            @endif
                        </div>
                        
                        @if($program->is_featured)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Featured:</span>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm font-medium">
                                    Featured Program
                                </span>
                            </div>
                        @endif
                        
                        @if($program->application_deadline)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Deadline:</span>
                                <span class="font-medium {{ \Carbon\Carbon::parse($program->application_deadline)->isPast() ? 'text-red-600' : '' }}">
                                    {{ \Carbon\Carbon::parse($program->application_deadline)->format('M j, Y') }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                    <div class="space-y-3">
                        @if($program->contact_email)
                            <div>
                                <span class="text-gray-600 text-sm">Email:</span>
                                <a href="mailto:{{ $program->contact_email }}" class="text-accent hover:text-accent-800 block">
                                    {{ $program->contact_email }}
                                </a>
                            </div>
                        @endif
                        
                        @if($program->contact_phone)
                            <div>
                                <span class="text-gray-600 text-sm">Phone:</span>
                                <a href="tel:{{ $program->contact_phone }}" class="text-accent hover:text-accent-800 block">
                                    {{ $program->contact_phone }}
                                </a>
                            </div>
                        @endif
                        
                        @if($program->website)
                            <div>
                                <span class="text-gray-600 text-sm">Website:</span>
                                <a href="{{ $program->website }}" target="_blank" class="text-accent hover:text-accent-800 block">
                                    Visit Website
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Application Assistance -->
                <div class="card bg-gradient-to-br from-accent to-accent-800 text-white">
                    <h3 class="text-lg font-semibold mb-4">Need Application Help?</h3>
                    <p class="text-accent-100 mb-4">Get assistance with your application process, document preparation, and admission guidance.</p>
                    
                    @auth
                        <a href="{{ route('mentorship.index') }}" class="btn-primary bg-white text-accent hover:bg-gray-100 w-full text-center">
                            Book Consultation
                        </a>
                    @else
                        <div class="space-y-3">
                            <a href="{{ route('login') }}" class="btn-primary bg-white text-accent hover:bg-gray-100 w-full text-center">
                                Sign In for Assistance
                            </a>
                            <p class="text-xs text-accent-100 text-center">
                                Sign in to access our mentorship and application assistance services
                            </p>
                        </div>
                    @endauth
                </div>

                <!-- Quick Actions -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <!-- Primary Actions -->
                        @if($program->website)
                            <a href="{{ $program->website }}" target="_blank" class="btn-primary w-full text-center flex items-center justify-center space-x-2">
                                <span>🌐</span>
                                <span>Visit Institution Website</span>
                            </a>
                        @endif
                        
                        @if($program->contact_email)
                            <a href="mailto:{{ $program->contact_email }}?subject=Inquiry about {{ urlencode($program->name) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2">
                                <span>📧</span>
                                <span>Contact Institution</span>
                            </a>
                        @endif
                        
                        @if($program->contact_phone)
                            <a href="tel:{{ $program->contact_phone }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2">
                                <span>📞</span>
                                <span>Call Institution</span>
                            </a>
                        @endif
                        
                        <!-- Secondary Actions -->
                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Explore Related Content</h4>
                            <div class="space-y-2">
                                <a href="{{ route('programs.index') }}?field={{ urlencode($program->field_of_study) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>🎓</span>
                                    <span>More {{ $program->field_of_study }} Programs</span>
                                </a>
                                
                                <a href="{{ route('programs.index') }}?location={{ urlencode($program->location) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>📍</span>
                                    <span>Programs in {{ $program->location }}</span>
                                </a>
                                
                                <a href="{{ route('schools.index') }}?search={{ urlencode($program->institution) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>🏫</span>
                                    <span>View {{ $program->institution }}</span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Tertiary Actions -->
                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">General Navigation</h4>
                            <div class="space-y-2">
                                <a href="{{ route('programs.index') }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>📚</span>
                                    <span>Browse All Programs</span>
                                </a>
                                
                                <a href="{{ route('schools.index') }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>🏢</span>
                                    <span>Browse All Schools</span>
                                </a>
                                
                                <a href="{{ route('opportunities.index') }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>💼</span>
                                    <span>Browse Opportunities</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 