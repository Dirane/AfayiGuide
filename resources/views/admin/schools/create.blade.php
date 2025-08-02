@extends('layouts.admin')

@section('title', 'Add New School')
@section('description', 'Add a new school or institution to AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Add New School</h1>
                    <p class="text-xl text-gray-200">Create a new school or institution</p>
                </div>
                <div>
                    <a href="{{ route('admin.schools.index') }}" class="btn-outline">
                        Back to Schools
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card">
            <form action="{{ route('admin.schools.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">School Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="input-field @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Institution Type *</label>
                            <select name="type" id="type" required class="input-field @error('type') border-red-500 @enderror">
                                <option value="">Select Type</option>
                                <option value="university" {{ old('type') == 'university' ? 'selected' : '' }}>University</option>
                                <option value="college" {{ old('type') == 'college' ? 'selected' : '' }}>College</option>
                                <option value="institute" {{ old('type') == 'institute' ? 'selected' : '' }}>Institute</option>
                                <option value="polytechnic" {{ old('type') == 'polytechnic' ? 'selected' : '' }}>Polytechnic</option>
                                <option value="vocational" {{ old('type') == 'vocational' ? 'selected' : '' }}>Vocational School</option>
                            </select>
                            @error('type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location *</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}" required
                                   class="input-field @error('location') border-red-500 @enderror">
                            @error('location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                            <textarea name="description" id="description" rows="4" required
                                      class="input-field @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900">Contact Information</h3>
                        
                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email *</label>
                            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" required
                                   class="input-field @error('contact_email') border-red-500 @enderror">
                            @error('contact_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone *</label>
                            <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}" required
                                   class="input-field @error('contact_phone') border-red-500 @enderror">
                            @error('contact_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" id="website" value="{{ old('website') }}"
                                   class="input-field @error('website') border-red-500 @enderror">
                            @error('website')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">School Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="input-field @error('image') border-red-500 @enderror">
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Arrays Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900">Program Details</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Admission Requirements *</label>
                            <div class="space-y-2" id="requirements-container">
                                <div class="flex">
                                    <input type="text" name="admission_requirements[]" class="input-field flex-1" placeholder="Requirement 1" required>
                                    <button type="button" onclick="addRequirement()" class="ml-2 btn-outline">Add</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Application Steps *</label>
                            <div class="space-y-2" id="steps-container">
                                <div class="flex">
                                    <input type="text" name="application_steps[]" class="input-field flex-1" placeholder="Step 1" required>
                                    <button type="button" onclick="addStep()" class="ml-2 btn-outline">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Required Documents *</label>
                            <div class="space-y-2" id="documents-container">
                                <div class="flex">
                                    <input type="text" name="required_documents[]" class="input-field flex-1" placeholder="Document 1" required>
                                    <button type="button" onclick="addDocument()" class="ml-2 btn-outline">Add</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Programs Offered *</label>
                            <div class="space-y-2" id="programs-container">
                                <div class="flex">
                                    <input type="text" name="programs_offered[]" class="input-field flex-1" placeholder="Program 1" required>
                                    <button type="button" onclick="addProgram()" class="ml-2 btn-outline">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t">
                    <a href="{{ route('admin.schools.index') }}" class="btn-outline">
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
function addRequirement() {
    const container = document.getElementById('requirements-container');
    const div = document.createElement('div');
    div.className = 'flex';
    div.innerHTML = `
        <input type="text" name="admission_requirements[]" class="input-field flex-1" placeholder="Requirement">
        <button type="button" onclick="this.parentElement.remove()" class="ml-2 btn-outline">Remove</button>
    `;
    container.appendChild(div);
}

function addStep() {
    const container = document.getElementById('steps-container');
    const div = document.createElement('div');
    div.className = 'flex';
    div.innerHTML = `
        <input type="text" name="application_steps[]" class="input-field flex-1" placeholder="Step">
        <button type="button" onclick="this.parentElement.remove()" class="ml-2 btn-outline">Remove</button>
    `;
    container.appendChild(div);
}

function addDocument() {
    const container = document.getElementById('documents-container');
    const div = document.createElement('div');
    div.className = 'flex';
    div.innerHTML = `
        <input type="text" name="required_documents[]" class="input-field flex-1" placeholder="Document">
        <button type="button" onclick="this.parentElement.remove()" class="ml-2 btn-outline">Remove</button>
    `;
    container.appendChild(div);
}

function addProgram() {
    const container = document.getElementById('programs-container');
    const div = document.createElement('div');
    div.className = 'flex';
    div.innerHTML = `
        <input type="text" name="programs_offered[]" class="input-field flex-1" placeholder="Program">
        <button type="button" onclick="this.parentElement.remove()" class="ml-2 btn-outline">Remove</button>
    `;
    container.appendChild(div);
}
</script>
@endsection 