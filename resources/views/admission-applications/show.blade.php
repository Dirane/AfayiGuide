@extends('layouts.app')

@section('title', 'Application Details')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Application Details</h2>
                    <a href="{{ route('admission-applications.index') }}" class="text-primary hover:text-primary-dark">
                        ← Back to Applications
                    </a>
                </div>

                <!-- Status Banner -->
                <div class="mb-6">
                    {!! $application->status_badge !!}
                </div>

                <!-- Application Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">School Information</h3>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="font-medium text-gray-700">School:</span>
                                <span class="text-gray-900">{{ $application->school->name }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Location:</span>
                                <span class="text-gray-900">{{ $application->school->location }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Type:</span>
                                <span class="text-gray-900">{{ $application->school->formatted_type }}</span>
                            </div>
                            @if($application->school->website)
                                <div>
                                    <span class="font-medium text-gray-700">Website:</span>
                                    <a href="{{ $application->school->website }}" target="_blank" class="text-primary hover:text-primary-dark">{{ $application->school->website }}</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Program Information</h3>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="font-medium text-gray-700">Program:</span>
                                <span class="text-gray-900">{{ $application->program_name }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Application Date:</span>
                                <span class="text-gray-900">{{ $application->created_at->format('M d, Y') }}</span>
                            </div>
                            @if($application->deadline)
                                <div>
                                    <span class="font-medium text-gray-700">Deadline:</span>
                                    <span class="text-gray-900">{{ $application->deadline->format('M d, Y') }}</span>
                                </div>
                            @endif
                            @if($application->submitted_at)
                                <div>
                                    <span class="font-medium text-gray-700">Submitted:</span>
                                    <span class="text-gray-900">{{ $application->submitted_at->format('M d, Y') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Fee Breakdown -->
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-3">Fee Breakdown</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-blue-800">Program Fee:</span>
                            <span class="font-medium text-blue-900">{{ $application->formatted_program_fee }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-800">Service Fee (15%):</span>
                            <span class="font-medium text-blue-900">{{ $application->formatted_application_fee }}</span>
                        </div>
                        <div class="flex justify-between border-t border-blue-200 pt-2">
                            <span class="font-semibold text-blue-900">Total Amount:</span>
                            <span class="font-bold text-blue-900">{{ $application->formatted_total_amount }}</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-green-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-green-900 mb-3">Contact Information</h3>
                    <div class="space-y-2 text-sm">
                        <div>
                            <span class="font-medium text-green-800">WhatsApp:</span>
                            <span class="text-green-900">{{ $application->additional_requirements }}</span>
                        </div>
                        <p class="text-green-700 mt-2">Our agent will contact you on WhatsApp to discuss the application process.</p>
                    </div>
                </div>

                <!-- Required Documents -->
                <div class="bg-yellow-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-yellow-900 mb-3">Required Documents to Prepare</h3>
                    <p class="text-sm text-yellow-800 mb-3">Please have the following documents ready when our agent contacts you:</p>
                    <ul class="space-y-2 text-sm text-yellow-800">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Birth Certificate or National ID
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Academic Transcripts/Certificates
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Passport-sized Photographs (4 copies)
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Medical Certificate
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Application Fee Payment Proof
                        </li>
                    </ul>
                </div>

                <!-- Next Steps -->
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-3">What Happens Next?</h3>
                    <div class="space-y-3 text-sm text-blue-800">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <span class="text-blue-800 text-xs font-bold">1</span>
                            </div>
                            <div>
                                <p class="font-medium">Agent Contact</p>
                                <p class="text-blue-700">Our agent will contact you on WhatsApp within 24 hours</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <span class="text-blue-800 text-xs font-bold">2</span>
                            </div>
                            <div>
                                <p class="font-medium">Document Collection</p>
                                <p class="text-blue-700">We'll help you gather and verify all required documents</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <span class="text-blue-800 text-xs font-bold">3</span>
                            </div>
                            <div>
                                <p class="font-medium">Application Submission</p>
                                <p class="text-blue-700">We'll submit your application to the school on your behalf</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <span class="text-blue-800 text-xs font-bold">4</span>
                            </div>
                            <div>
                                <p class="font-medium">Status Updates</p>
                                <p class="text-blue-700">We'll keep you updated on your application status</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Notes -->
                @if($application->response_notes)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                        <h3 class="text-lg font-semibold text-yellow-900 mb-3">Update from AfayiGuide</h3>
                        <p class="text-sm text-yellow-800">{{ $application->response_notes }}</p>
                        @if($application->response_date)
                            <p class="text-xs text-yellow-600 mt-2">Updated on {{ $application->response_date->format('M d, Y') }}</p>
                        @endif
                    </div>
                @endif

                <!-- Actions -->
                <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                    <div>
                        @if($application->status === 'pending')
                            <form method="POST" action="{{ route('admission-applications.cancel', $application) }}" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                        onclick="return confirm('Are you sure you want to cancel this application?')">
                                    Cancel Application
                                </button>
                            </form>
                        @endif
                    </div>
                    <div class="text-sm text-gray-500">
                        Application ID: #{{ $application->id }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 