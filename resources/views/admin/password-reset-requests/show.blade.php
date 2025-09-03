@extends('layouts.admin')

@section('title', 'Password Reset Request Details')
@section('description', 'View and process password reset request')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Password Reset Request #{{ $request->id }}</h2>
                    <a href="{{ route('admin.password-reset-requests.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        ← Back to Requests
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

                <!-- Request Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Request Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Contact Method</p>
                                <p class="text-gray-900">{{ ucfirst($request->request_type) }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Contact Information</p>
                                <p class="text-gray-900">{{ $request->email ?: $request->whatsapp_number }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Status</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $request->status_badge }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Requested On</p>
                                <p class="text-gray-900">{{ $request->created_at ? $request->created_at->format('M d, Y H:i') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    @if($user)
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">User Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Name</p>
                                <p class="text-gray-900">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Email</p>
                                <p class="text-gray-900">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">WhatsApp</p>
                                <p class="text-gray-900">{{ $user->whatsapp_number ?: 'Not provided' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Role</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Account Created</p>
                                <p class="text-gray-900">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-red-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-red-900 mb-4">User Not Found</h3>
                        <p class="text-red-800">No user account found with the provided contact information.</p>
                    </div>
                    @endif
                </div>

                @if($request->admin_notes)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Admin Notes</h3>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <p class="text-yellow-800">{{ $request->admin_notes }}</p>
                    </div>
                </div>
                @endif

                @if($request->status === 'pending' && $user)
                <!-- Process Request -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Process Request</h3>
                    <form method="POST" action="{{ url('/admin/password-reset-requests/' . $request->id . '/process') }}" class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Action</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="action" value="approve" class="mr-2" required>
                                    <span class="text-sm text-gray-700">Approve - Reset password to default and notify user</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="action" value="reject" class="mr-2" required>
                                    <span class="text-sm text-gray-700">Reject - Deny the password reset request</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes (Optional)</label>
                            <textarea name="admin_notes" id="admin_notes" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Add any notes about this request...">{{ old('admin_notes') }}</textarea>
                        </div>
                        <div class="flex space-x-3">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Process Request
                            </button>
                        </div>
                    </form>
                </div>
                @endif

                @if($request->status !== 'pending')
                <!-- Request Status -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Request Status</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Status</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $request->status_badge }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </div>
                            @if($request->processedBy)
                            <div>
                                <p class="text-sm font-medium text-gray-600">Processed By</p>
                                <p class="text-gray-900">{{ $request->processedBy ? $request->processedBy->name : 'N/A' }}</p>
                            </div>
                            @endif
                            @if($request->processed_at)
                            <div>
                                <p class="text-sm font-medium text-gray-600">Processed On</p>
                                <p class="text-gray-900">{{ $request->processed_at ? $request->processed_at->format('M d, Y H:i') : 'N/A' }}</p>
                            </div>
                            @endif
                            @if(session('whatsapp_link'))
                            <div class="md:col-span-2">
                                <p class="text-sm font-medium text-gray-600 mb-2">Quick WhatsApp Message</p>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
                                    <a href="{{ session('whatsapp_link') }}" target="_blank" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"></path>
                                        </svg>
                                        Open WhatsApp
                                    </a>
                                    <button type="button" onclick="navigator.clipboard.writeText(`{{ session('whatsapp_message') }}`); this.innerText='Copied!'; setTimeout(()=>this.innerText='Copy Message', 2000);" class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded">
                                        Copy Message
                                    </button>
                                </div>
                                <pre class="mt-3 text-xs bg-gray-100 p-3 rounded border border-gray-200 overflow-auto">{{ session('whatsapp_message') }}</pre>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Actions -->
                <div class="flex justify-between items-center">
                    <form method="POST" action="{{ url('/admin/password-reset-requests/' . $request->id) }}" onsubmit="return confirm('Are you sure you want to delete this request?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete Request
                        </button>
                    </form>
                    
                    @if($user)
                    <div class="flex space-x-2">
                        @if($user->whatsapp_number)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $user->whatsapp_number) }}" 
                           target="_blank" 
                           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                            WhatsApp
                        </a>
                        @endif
                        <a href="mailto:{{ $user->email }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            Email
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
