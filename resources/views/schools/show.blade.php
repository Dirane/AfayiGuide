@extends('layouts.app')

@section('title', $school->name . ' - Admission Requirements & Application')
@section('description', $school->description)

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $school->name }}</h1>
                <p class="text-xl text-gray-200">{{ ucfirst($school->type) }} • {{ $school->location }}</p>
            </div>
        </div>
    </div>

    <!-- School Details -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- About -->
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About {{ $school->name }}</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $school->description }}</p>
                </div>

                <!-- Admission Requirements -->
                @if($school->admission_requirements)
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Admission Requirements</h2>
                    <div class="space-y-3">
                        @foreach($school->admission_requirements as $requirement)
                            <div class="flex items-start space-x-3">
                                <div class="text-accent mt-1">•</div>
                                <div class="text-gray-700">{{ $requirement }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Application Steps -->
                @if($school->application_steps)
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Application Steps</h2>
                    <div class="space-y-4">
                        @foreach($school->application_steps as $index => $step)
                            <div class="flex items-start space-x-4">
                                <div class="bg-accent text-white rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1">
                                    <p class="text-gray-700">{{ $step }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Required Documents -->
                @if($school->documents_required)
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Required Documents</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($school->documents_required as $document)
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                <div class="text-accent">📄</div>
                                <span class="text-gray-700">{{ $document }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Programs Offered -->
                @if($programs->count() > 0)
                <div class="card">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Programs Offered</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($programs as $program)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="font-semibold text-gray-900 mb-2">{{ $program->name }}</h3>
                                <div class="space-y-1 text-sm text-gray-600">
                                    <div><span class="font-medium">Level:</span> {{ $program->level }}</div>
                                    <div><span class="font-medium">Duration:</span> {{ $program->duration_months }} months</div>
                                    @if($program->tuition_fee)
                                        <div><span class="font-medium">Tuition:</span> {{ number_format($program->tuition_fee) }} {{ $program->currency }}</div>
                                    @endif
                                </div>
                                <a href="{{ route('programs.show', $program) }}" class="text-accent hover:text-accent-800 text-sm font-medium mt-2 inline-block">
                                    View Program Details →
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Application Status -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Status</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Status:</span>
                            @if($school->isApplicationOpen())
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">
                                    Open for Applications
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">
                                    Applications Closed
                                </span>
                            @endif
                        </div>
                        
                        @if($school->application_deadline)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Deadline:</span>
                                <span class="font-medium {{ $school->application_deadline->isPast() ? 'text-red-600' : '' }}">
                                    {{ $school->application_deadline->format('M j, Y') }}
                                </span>
                            </div>
                        @endif
                        
                        @if($school->application_fee)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Application Fee:</span>
                                <span class="font-semibold text-accent">{{ number_format($school->application_fee) }} {{ $school->currency }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                    <div class="space-y-3">
                        @if($school->address)
                            <div>
                                <span class="text-gray-600 text-sm">Address:</span>
                                <p class="text-gray-700">{{ $school->address }}</p>
                            </div>
                        @endif
                        
                        @if($school->contact_email)
                            <div>
                                <span class="text-gray-600 text-sm">Email:</span>
                                <a href="mailto:{{ $school->contact_email }}" class="text-accent hover:text-accent-800">
                                    {{ $school->contact_email }}
                                </a>
                            </div>
                        @endif
                        
                        @if($school->contact_phone)
                            <div>
                                <span class="text-gray-600 text-sm">Phone:</span>
                                <a href="tel:{{ $school->contact_phone }}" class="text-accent hover:text-accent-800">
                                    {{ $school->contact_phone }}
                                </a>
                            </div>
                        @endif
                        
                        @if($school->website)
                            <div>
                                <span class="text-gray-600 text-sm">Website:</span>
                                <a href="{{ $school->website }}" target="_blank" class="text-accent hover:text-accent-800">
                                    Visit Website
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Application Assistance -->
                <div class="card bg-gradient-to-br from-accent to-accent-800 text-white">
                    <h3 class="text-lg font-semibold mb-4">Need Application Assistance?</h3>
                    <p class="text-accent-100 mb-4">Get help with your application process, document preparation, and admission guidance.</p>
                    
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
                        @if($school->website)
                            <a href="{{ $school->website }}" target="_blank" class="btn-primary w-full text-center flex items-center justify-center space-x-2">
                                <span>🌐</span>
                                <span>Visit Official Website</span>
                            </a>
                        @endif
                        
                        @if($school->contact_email)
                            <a href="mailto:{{ $school->contact_email }}?subject=Inquiry about {{ urlencode($school->name) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2">
                                <span>📧</span>
                                <span>Contact School</span>
                            </a>
                        @endif
                        
                        @if($school->contact_phone)
                            <a href="tel:{{ $school->contact_phone }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2">
                                <span>📞</span>
                                <span>Call School</span>
                            </a>
                        @endif
                        
                        <!-- Secondary Actions -->
                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Explore Related Content</h4>
                            <div class="space-y-2">
                                <a href="{{ route('programs.index') }}?search={{ urlencode($school->name) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>🎓</span>
                                    <span>Programs at {{ $school->name }}</span>
                                </a>
                                
                                <a href="{{ route('schools.index') }}?location={{ urlencode($school->location) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>📍</span>
                                    <span>Schools in {{ $school->location }}</span>
                                </a>
                                
                                <a href="{{ route('schools.index') }}?type={{ urlencode($school->type) }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>🏛️</span>
                                    <span>More {{ ucfirst($school->type) }}s</span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Tertiary Actions -->
                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">General Navigation</h4>
                            <div class="space-y-2">
                                <a href="{{ route('schools.index') }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>🏢</span>
                                    <span>Browse All Schools</span>
                                </a>
                                
                                <a href="{{ route('programs.index') }}" class="btn-outline w-full text-center flex items-center justify-center space-x-2 text-sm">
                                    <span>📚</span>
                                    <span>Browse All Programs</span>
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