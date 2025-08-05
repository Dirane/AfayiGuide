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
            <form method="POST" action="{{ route('admin.schools.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900">Basic Information</h3>
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">School Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">School Type *</label>
                            <select name="type" id="type" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
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
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location *</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900">Contact Information</h3>
                        
                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            @error('contact_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            @error('contact_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" id="website" value="{{ old('website') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            @error('website')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address" id="address" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">School Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Dynamic Fields -->
                <div class="mt-8 space-y-6">
                    <h3 class="text-lg font-semibold text-gray-900">Additional Information</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Admission Requirements</label>
                        <div id="admission-requirements" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="admission_requirements[]" placeholder="e.g., Minimum GPA 3.0"
                                       class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                                <button type="button" onclick="addField('admission-requirements')" class="btn-accent px-3 py-2">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Application Steps</label>
                        <div id="application-steps" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="application_steps[]" placeholder="e.g., Submit online application"
                                       class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                                <button type="button" onclick="addField('application-steps')" class="btn-accent px-3 py-2">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Required Documents</label>
                        <div id="required-documents" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="required_documents[]" placeholder="e.g., Birth certificate"
                                       class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                                <button type="button" onclick="addField('required-documents')" class="btn-accent px-3 py-2">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Programs Offered</label>
                        <div id="programs-offered" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="programs_offered[]" placeholder="e.g., Computer Science"
                                       class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                                <button type="button" onclick="addField('programs-offered')" class="btn-accent px-3 py-2">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mt-8">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Active (visible to users)
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.schools.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
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
    newField.className = 'flex gap-2';
    newField.innerHTML = `
        <input type="text" name="${containerId.replace('-', '_')}[]" placeholder="Add another item"
               class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
        <button type="button" onclick="removeField(this)" class="btn-secondary px-3 py-2">
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