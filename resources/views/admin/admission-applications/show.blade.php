@extends('layouts.admin')

@section('title', 'Application Details')
@section('description', 'View and manage admission application details')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Application #{{ $admission_application->id }}</h2>
                    <a href="{{ route('admin.admission-applications.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        ← Back to Applications
                    </a>
                </div>

                <!-- Application Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Student Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Full Name</p>
                                <p class="text-gray-900">{{ $admission_application->user->name ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Email</p>
                                <p class="text-gray-900">{{ $admission_application->user->email ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Phone</p>
                                <p class="text-gray-900">{{ $admission_application->user->phone ?? 'Not provided' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">WhatsApp</p>
                                <p class="text-gray-900">{{ $admission_application->user->whatsapp_number ?? 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Details</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">School</p>
                                <p class="text-gray-900">{{ $admission_application->school->name ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Program</p>
                                <p class="text-gray-900">{{ $admission_application->program ?? 'Not specified' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Status</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $admission_application->status_badge ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($admission_application->status) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Applied On</p>
                                <p class="text-gray-900">{{ $admission_application->created_at ? $admission_application->created_at->format('M d, Y g:i A') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Information -->
                @if($admission_application->motivation || $admission_application->academic_background || $admission_application->extracurricular_activities)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($admission_application->motivation)
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-medium text-blue-900 mb-2">Motivation</h4>
                            <p class="text-blue-800">{{ $admission_application->motivation }}</p>
                        </div>
                        @endif
                        @if($admission_application->academic_background)
                        <div class="bg-green-50 rounded-lg p-4">
                            <h4 class="font-medium text-green-900 mb-2">Academic Background</h4>
                            <p class="text-green-800">{{ $admission_application->academic_background }}</p>
                        </div>
                        @endif
                        @if($admission_application->extracurricular_activities)
                        <div class="bg-yellow-50 rounded-lg p-4">
                            <h4 class="font-medium text-yellow-900 mb-2">Extracurricular Activities</h4>
                            <p class="text-yellow-800">{{ $admission_application->extracurricular_activities }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Status Update -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                    <form method="POST" action="{{ route('admin.admission-applications.update-status', $admission_application) }}" class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="status" id="status" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                                    <option value="pending" {{ $admission_application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $admission_application->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="submitted" {{ $admission_application->status === 'submitted' ? 'selected' : '' }}>Submitted</option>
                                    <option value="accepted" {{ $admission_application->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="rejected" {{ $admission_application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="cancelled" {{ $admission_application->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <div>
                                <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Deadline (Optional)</label>
                                <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $admission_application->deadline ? $admission_application->deadline->format('Y-m-d') : '') }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                            <textarea name="notes" id="notes" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Add any notes about this application...">{{ old('notes', $admission_application->notes) }}</textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Status
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center">
                    <form method="POST" action="{{ route('admin.admission-applications.destroy', $admission_application) }}" onsubmit="return confirm('Are you sure you want to delete this application?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete Application
                        </button>
                    </form>
                    
                    <div class="flex space-x-2">
                        @if($admission_application->user->whatsapp_number)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $admission_application->user->whatsapp_number) }}" 
                           target="_blank" 
                           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Contact via WhatsApp
                        </a>
                        @endif
                        <a href="mailto:{{ $admission_application->user->email }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Send Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
