@extends('layouts.admin')

@section('title', 'Assessment Details')
@section('description', 'View PathFinder assessment details')

@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Assessment #{{ $assessment->id }}</h2>
                    <a href="{{ route('admin.assessments.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        ← Back to Assessments
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">User Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Name</p>
                                <p class="text-gray-900">{{ $assessment->user->name ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Email</p>
                                <p class="text-gray-900">{{ $assessment->user->email ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Submitted</p>
                                <p class="text-gray-900">{{ $assessment->created_at ? $assessment->created_at->format('M d, Y H:i') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Summary</h3>
                        <div class="space-y-3 text-sm text-gray-900">
                            <p><span class="font-medium text-gray-600">Academic Background:</span> {{ $assessment->academic_background_text }}</p>
                            <p><span class="font-medium text-gray-600">Field of Interest:</span> {{ $assessment->formatted_field_of_interest ?? '—' }}</p>
                            <p><span class="font-medium text-gray-600">Career Goals:</span> {{ $assessment->career_goals_text }}</p>
                            <p><span class="font-medium text-gray-600">Aspirations:</span> {{ $assessment->aspirations_text }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-blue-900 mb-4">Skills</h3>
                        <p class="text-blue-800 whitespace-pre-line">{{ $assessment->skills_text }}</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-yellow-900 mb-4">Interests</h3>
                        <p class="text-yellow-800 whitespace-pre-line">{{ $assessment->interests_text }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-green-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-green-900 mb-4">Preferred Location</h3>
                        <p class="text-green-800">{{ $assessment->preferred_location_text }}</p>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-purple-900 mb-4">Budget Range</h3>
                        <p class="text-purple-800">{{ $assessment->budget_range_text }}</p>
                    </div>
                </div>

                @if(!empty($assessment->additional_notes))
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Additional Notes</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-800 whitespace-pre-line">{{ $assessment->additional_notes }}</p>
                    </div>
                </div>
                @endif

                <div class="flex items-center justify-between">
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.assessments.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                    <div class="flex space-x-3">
                        @if($assessment->user->whatsapp_number)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $assessment->user->whatsapp_number) }}" 
                           target="_blank" 
                           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
+                            </svg>
+                            WhatsApp
+                        </a>
+                        @endif
+                        <a href="mailto:{{ $assessment->user->email }}" 
+                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center">
+                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
+                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
+                            </svg>
+                            Email
+                        </a>
+                        <form method="POST" action="{{ route('admin.assessments.destroy', $assessment) }}" onsubmit="return confirm('Delete this assessment?')" class="inline">
+                            @csrf
+                            @method('DELETE')
+                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
+                        </form>
+                    </div>
+                </div>
            </div>
        </div>
    </div>
</div>
@endsection


