@extends('layouts.admin')

@section('title', 'Add New School')
@section('description', 'Add a new educational institution to the platform.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Add New School</h1>
                    <p class="text-xl text-gray-200">Create a new educational institution</p>
                </div>
                <a href="{{ route('admin.schools.index') }}" class="btn-accent">
                    Back to Schools
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card">
            <form method="POST" action="{{ route('admin.schools.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Basic Information</h3>
                            <p class="text-sm text-gray-600 mt-1">Essential details about the school</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    School Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                       placeholder="Enter school name">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                                    School Type <span class="text-red-500">*</span>
                                </label>
                                <select name="type" id="type" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                                    <option value="">Select Type</option>
                                    <option value="university" {{ old('type') == 'university' ? 'selected' : '' }}>University</option>
                                    <option value="college" {{ old('type') == 'college' ? 'selected' : '' }}>College</option>
                                    <option value="institute" {{ old('type') == 'institute' ? 'selected' : '' }}>Institute</option>
                                    <option value="polytechnic" {{ old('type') == 'polytechnic' ? 'selected' : '' }}>Polytechnic</option>
                                    <option value="vocational" {{ old('type') == 'vocational' ? 'selected' : '' }}>Vocational</option>
                                    <option value="secondary" {{ old('type') == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                    <option value="primary" {{ old('type') == 'primary' ? 'selected' : '' }}>Primary</option>
                                </select>
                                @error('type')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Location <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="location" id="location" value="{{ old('location') }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                       placeholder="Enter city, country">
                                @error('location')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                                <textarea name="description" id="description" rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                          placeholder="Describe the school, its mission, and key features">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Contact Information</h3>
                            <p class="text-sm text-gray-600 mt-1">How to reach the school</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="contact_email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                       placeholder="contact@school.edu">
                                @error('contact_email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                       placeholder="+1234567890">
                                @error('contact_phone')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="website" class="block text-sm font-semibold text-gray-700 mb-2">Website</label>
                                <input type="url" name="website" id="website" value="{{ old('website') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                       placeholder="https://www.school.edu">
                                @error('website')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                                <textarea name="address" id="address" rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                          placeholder="Full physical address of the school">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">School Image</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary-800 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="currency" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Currency <span class="text-red-500">*</span>
                                </label>
                                <select name="currency" id="currency" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                                    <option value="">Select Currency</option>
                                    <option value="XAF" {{ old('currency', 'XAF') == 'XAF' ? 'selected' : '' }}>XAF (Central African CFA franc)</option>
                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                                    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                                </select>
                                @error('currency')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fee Information -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Fee Information</h3>
                        <p class="text-sm text-gray-600 mt-1">Costs associated with the school</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="application_fee" class="block text-sm font-semibold text-gray-700 mb-2">Application Fee</label>
                            <input type="number" name="application_fee" id="application_fee" value="{{ old('application_fee') }}" min="0" step="0.01"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                   placeholder="e.g., 25000">
                            <p class="mt-2 text-sm text-gray-500">Leave empty if not specified</p>
                            @error('application_fee')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tuition_fee_min" class="block text-sm font-semibold text-gray-700 mb-2">Minimum Tuition Fee</label>
                            <input type="number" name="tuition_fee_min" id="tuition_fee_min" value="{{ old('tuition_fee_min') }}" min="0" step="0.01"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                   placeholder="e.g., 150000">
                            <p class="mt-2 text-sm text-gray-500">Leave empty if not specified</p>
                            @error('tuition_fee_min')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tuition_fee_max" class="block text-sm font-semibold text-gray-700 mb-2">Maximum Tuition Fee</label>
                            <input type="number" name="tuition_fee_max" id="tuition_fee_max" value="{{ old('tuition_fee_max') }}" min="0" step="0.01"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200"
                                   placeholder="e.g., 250000">
                            <p class="mt-2 text-sm text-gray-500">Leave empty if not specified</p>
                            @error('tuition_fee_max')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Dynamic Fields -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Additional Information</h3>
                        <p class="text-sm text-gray-600 mt-1">Additional details about programs and requirements</p>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Admission Requirements</label>
                            <div id="admission-requirements" class="space-y-3">
                                <div class="flex gap-3">
                                    <input type="text" name="admission_requirements[]" placeholder="e.g., Minimum GPA 3.0"
                                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                                    <button type="button" onclick="addField('admission-requirements')" class="btn-accent px-4 py-3 rounded-lg">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Application Steps</label>
                            <div id="application-steps" class="space-y-3">
                                <div class="flex gap-3">
                                    <input type="text" name="application_steps[]" placeholder="e.g., Submit online application"
                                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                                    <button type="button" onclick="addField('application-steps')" class="btn-accent px-4 py-3 rounded-lg">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Required Documents</label>
                            <div id="required-documents" class="space-y-3">
                                <div class="flex gap-3">
                                    <input type="text" name="required_documents[]" placeholder="e.g., Birth certificate"
                                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                                    <button type="button" onclick="addField('required-documents')" class="btn-accent px-4 py-3 rounded-lg">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Programs Offered</label>
                            <div id="programs-offered" class="space-y-3">
                                <div class="flex gap-3">
                                    <input type="text" name="programs_offered[]" placeholder="e.g., Computer Science"
                                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
                                    <button type="button" onclick="addField('programs-offered')" class="btn-accent px-4 py-3 rounded-lg">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="is_active" class="ml-3 block text-sm font-medium text-gray-900">
                            Active (visible to users)
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="border-t border-gray-200 pt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.schools.index') }}" class="btn-secondary px-6 py-3 rounded-lg">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg">
                        Create School
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function addField(containerId) {
    const container = document.getElementById(containerId);
    const newField = document.createElement('div');
    newField.className = 'flex gap-3';
    newField.innerHTML = `
        <input type="text" name="${containerId.replace('-', '_')}[]" placeholder="Add another item"
               class="flex-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200">
        <button type="button" onclick="removeField(this)" class="btn-secondary px-4 py-3 rounded-lg">
            Remove
        </button>
    `;
    container.appendChild(newField);
}

function removeField(button) {
    button.parentElement.remove();
}
</script>
@endsection 