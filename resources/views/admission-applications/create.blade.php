@extends('layouts.app')

@section('title', 'Apply for Admission - ' . $school->name)

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Apply for Admission</h2>
                    <p class="text-gray-600 mt-2">Let us handle your admission application to {{ $school->name }}</p>
                </div>

                <!-- School Information -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $school->name }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-medium text-gray-700">Location:</span>
                            <span class="text-gray-600">{{ $school->location }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Type:</span>
                            <span class="text-gray-600">{{ $school->formatted_type }}</span>
                        </div>
                        @if($school->website)
                            <div>
                                <span class="font-medium text-gray-700">Website:</span>
                                <a href="{{ $school->website }}" target="_blank" class="text-primary hover:text-primary-dark">{{ $school->website }}</a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Service Information -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">Our Service</h3>
                    <ul class="text-sm text-blue-800 space-y-1">
                        <li>• We handle the entire admission application process</li>
                        <li>• We ensure all required documents are properly submitted</li>
                        <li>• We follow up with the school on your behalf</li>
                        <li>• We keep you updated on the application status</li>
                        <li>• Service fee: 15% of the program fee</li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('admission-applications.store', $school) }}">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Program Selection -->
                        <div>
                            <label for="program_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Program Name *
                            </label>
                            <input type="text" name="program_name" id="program_name" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                   value="{{ old('program_name') }}" placeholder="e.g., Computer Science, Business Administration" required>
                            @error('program_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- WhatsApp Number -->
                        <div>
                            <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 mb-2">
                                WhatsApp Number *
                            </label>
                            <input type="text" name="whatsapp_number" id="whatsapp_number" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                   value="{{ old('whatsapp_number') }}" placeholder="e.g., +237 6XX XXX XXX" required>
                            <p class="mt-1 text-sm text-gray-500">We'll contact you on WhatsApp to discuss the application process.</p>
                            @error('whatsapp_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fee Information -->
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-medium text-blue-900 mb-2">Fee Information</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-blue-800">Program Fee:</span>
                                    <span class="font-medium text-blue-900">50,000 XAF</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-blue-800">Service Fee (15%):</span>
                                    <span class="font-medium text-blue-900">7,500 XAF</span>
                                </div>
                                <div class="flex justify-between border-t border-blue-200 pt-2">
                                    <span class="font-semibold text-blue-900">Total Amount:</span>
                                    <span class="font-bold text-blue-900">57,500 XAF</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-between items-center">
                            <a href="{{ route('schools.show', $school) }}" class="text-gray-600 hover:text-gray-900">
                                ← Back to School Details
                            </a>
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-6 rounded">
                                Submit Application
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection 