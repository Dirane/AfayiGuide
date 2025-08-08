@extends('layouts.admin')

@section('title', 'Edit Opportunity')
@section('description', 'Update opportunity information')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Opportunity</h1>
            <p class="text-gray-600">Update opportunity information</p>
        </div>
        <a href="{{ route('admin.opportunities.index') }}" class="btn-primary">
            Back to Opportunities
        </a>
    </div>

    <div class="card">
        <form action="{{ route('admin.opportunities.update', $opportunity) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $opportunity->title) }}" required
                           class="input-field @error('title') border-red-500 @enderror"
                           placeholder="Enter opportunity title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type *</label>
                    <select name="type" id="type" required
                            class="input-field @error('type') border-red-500 @enderror">
                        <option value="">Select type</option>
                        <option value="scholarship" {{ old('type', $opportunity->type) == 'scholarship' ? 'selected' : '' }}>Scholarship</option>
                        <option value="internship" {{ old('type', $opportunity->type) == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="job" {{ old('type', $opportunity->type) == 'job' ? 'selected' : '' }}>Job</option>
                        <option value="training" {{ old('type', $opportunity->type) == 'training' ? 'selected' : '' }}>Training</option>
                        <option value="competition" {{ old('type', $opportunity->type) == 'competition' ? 'selected' : '' }}>Competition</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Organization -->
                <div>
                    <label for="organization" class="block text-sm font-medium text-gray-700">Organization *</label>
                    <input type="text" name="organization" id="organization" value="{{ old('organization', $opportunity->organization) }}" required
                           class="input-field @error('organization') border-red-500 @enderror"
                           placeholder="Enter organization name">
                    @error('organization')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $opportunity->location) }}"
                           class="input-field @error('location') border-red-500 @enderror"
                           placeholder="Enter location">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" name="amount" id="amount" value="{{ old('amount', $opportunity->amount) }}" step="0.01" min="0"
                           class="input-field @error('amount') border-red-500 @enderror"
                           placeholder="Enter amount">
                    @error('amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Currency -->
                <div>
                    <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                    <select name="currency" id="currency" class="input-field @error('currency') border-red-500 @enderror">
                        <option value="">Select currency</option>
                        <option value="XAF" {{ old('currency', $opportunity->currency) == 'XAF' ? 'selected' : '' }}>XAF (CFA Franc)</option>
                        <option value="USD" {{ old('currency', $opportunity->currency) == 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                        <option value="EUR" {{ old('currency', $opportunity->currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                        <option value="GBP" {{ old('currency', $opportunity->currency) == 'GBP' ? 'selected' : '' }}>GBP (British Pound)</option>
                    </select>
                    @error('currency')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deadline -->
                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $opportunity->deadline ? $opportunity->deadline->format('Y-m-d') : '') }}"
                           class="input-field @error('deadline') border-red-500 @enderror">
                    @error('deadline')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Application URL -->
                <div>
                    <label for="application_url" class="block text-sm font-medium text-gray-700">Application URL</label>
                    <input type="url" name="application_url" id="application_url" value="{{ old('application_url', $opportunity->application_url) }}"
                           class="input-field @error('application_url') border-red-500 @enderror"
                           placeholder="https://example.com/apply">
                    @error('application_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                <textarea name="description" id="description" rows="4" required
                          class="input-field @error('description') border-red-500 @enderror"
                          placeholder="Enter detailed description of the opportunity">{{ old('description', $opportunity->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-700">Requirements</label>
                <textarea name="requirements" id="requirements" rows="3"
                          class="input-field @error('requirements') border-red-500 @enderror"
                          placeholder="Enter requirements for the opportunity">{{ old('requirements', $opportunity->requirements) }}</textarea>
                @error('requirements')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Benefits -->
            <div>
                <label for="benefits" class="block text-sm font-medium text-gray-700">Benefits</label>
                <textarea name="benefits" id="benefits" rows="3"
                          class="input-field @error('benefits') border-red-500 @enderror"
                          placeholder="Enter benefits of the opportunity">{{ old('benefits', $opportunity->benefits) }}</textarea>
                @error('benefits')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image -->
            @if($opportunity->image)
            <div>
                <label class="block text-sm font-medium text-gray-700">Current Image</label>
                <div class="mt-2">
                    <img src="{{ Storage::url($opportunity->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
                </div>
            </div>
            @endif

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Update Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="input-field @error('image') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload a new image for the opportunity (max 2MB)</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       {{ old('is_active', $opportunity->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">
                    Active (visible to students)
                </label>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.opportunities.index') }}" class="btn-outline">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Opportunity
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 