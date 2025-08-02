@extends('layouts.admin')

@section('title', 'Edit School')
@section('description', 'Edit school information in AfayiGuide.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Edit School</h1>
                    <p class="text-xl text-gray-200">Update school information</p>
                </div>
                <div>
                    <a href="{{ route('admin.schools.show', $school) }}" class="btn-outline">
                        Back to School
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card">
            <form action="{{ route('admin.schools.update', $school) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">School Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $school->name) }}" required
                               class="input-field @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Type *</label>
                        <select name="type" id="type" required class="input-field @error('type') border-red-500 @enderror">
                            <option value="">Select type</option>
                            <option value="university" {{ old('type', $school->type) == 'university' ? 'selected' : '' }}>University</option>
                            <option value="college" {{ old('type', $school->type) == 'college' ? 'selected' : '' }}>College</option>
                            <option value="institute" {{ old('type', $school->type) == 'institute' ? 'selected' : '' }}>Institute</option>
                            <option value="polytechnic" {{ old('type', $school->type) == 'polytechnic' ? 'selected' : '' }}>Polytechnic</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location *</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $school->location) }}" required
                           class="input-field @error('location') border-red-500 @enderror">
                    @error('location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                    <textarea name="description" id="description" rows="4" required
                              class="input-field @error('description') border-red-500 @enderror">{{ old('description', $school->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Information -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $school->email) }}"
                                   class="input-field @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $school->phone) }}"
                                   class="input-field @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="url" name="website" id="website" value="{{ old('website', $school->website) }}"
                               class="input-field @error('website') border-red-500 @enderror">
                        @error('website')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">School Image</label>
                        @if($school->image)
                            <div class="mt-2 mb-4">
                                <img src="{{ Storage::url($school->image) }}" alt="{{ $school->name }}" class="w-32 h-32 object-cover rounded-lg">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                               class="input-field @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Admission Requirements -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Admission Requirements</h3>
                    <div id="requirements-container">
                        @if($school->admission_requirements)
                            @foreach($school->admission_requirements as $index => $requirement)
                                <div class="requirement-item flex items-center space-x-2 mb-2">
                                    <input type="text" name="admission_requirements[]" value="{{ $requirement }}" 
                                           class="flex-1 input-field" placeholder="Enter admission requirement">
                                    <button type="button" onclick="removeRequirement(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addRequirement()" class="btn-outline mt-2">Add Requirement</button>
                </div>

                <!-- Application Steps -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Steps</h3>
                    <div id="steps-container">
                        @if($school->application_steps)
                            @foreach($school->application_steps as $index => $step)
                                <div class="step-item flex items-center space-x-2 mb-2">
                                    <input type="text" name="application_steps[]" value="{{ $step }}" 
                                           class="flex-1 input-field" placeholder="Enter application step">
                                    <button type="button" onclick="removeStep(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addStep()" class="btn-outline mt-2">Add Step</button>
                </div>

                <!-- Required Documents -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Required Documents</h3>
                    <div id="documents-container">
                        @if($school->required_documents)
                            @foreach($school->required_documents as $index => $document)
                                <div class="document-item flex items-center space-x-2 mb-2">
                                    <input type="text" name="required_documents[]" value="{{ $document }}" 
                                           class="flex-1 input-field" placeholder="Enter required document">
                                    <button type="button" onclick="removeDocument(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addDocument()" class="btn-outline mt-2">Add Document</button>
                </div>

                <!-- Programs Offered -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Programs Offered</h3>
                    <div id="programs-container">
                        @if($school->programs_offered)
                            @foreach($school->programs_offered as $index => $program)
                                <div class="program-item flex items-center space-x-2 mb-2">
                                    <input type="text" name="programs_offered[]" value="{{ $program }}" 
                                           class="flex-1 input-field" placeholder="Enter program name">
                                    <button type="button" onclick="removeProgram(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addProgram()" class="btn-outline mt-2">Add Program</button>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t">
                    <a href="{{ route('admin.schools.show', $school) }}" class="btn-outline">Cancel</a>
                    <button type="submit" class="btn-primary">Update School</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function addRequirement() {
        const container = document.getElementById('requirements-container');
        const div = document.createElement('div');
        div.className = 'requirement-item flex items-center space-x-2 mb-2';
        div.innerHTML = `
            <input type="text" name="admission_requirements[]" class="flex-1 input-field" placeholder="Enter admission requirement">
            <button type="button" onclick="removeRequirement(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
        `;
        container.appendChild(div);
    }

    function removeRequirement(button) {
        button.parentElement.remove();
    }

    function addStep() {
        const container = document.getElementById('steps-container');
        const div = document.createElement('div');
        div.className = 'step-item flex items-center space-x-2 mb-2';
        div.innerHTML = `
            <input type="text" name="application_steps[]" class="flex-1 input-field" placeholder="Enter application step">
            <button type="button" onclick="removeStep(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
        `;
        container.appendChild(div);
    }

    function removeStep(button) {
        button.parentElement.remove();
    }

    function addDocument() {
        const container = document.getElementById('documents-container');
        const div = document.createElement('div');
        div.className = 'document-item flex items-center space-x-2 mb-2';
        div.innerHTML = `
            <input type="text" name="required_documents[]" class="flex-1 input-field" placeholder="Enter required document">
            <button type="button" onclick="removeDocument(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
        `;
        container.appendChild(div);
    }

    function removeDocument(button) {
        button.parentElement.remove();
    }

    function addProgram() {
        const container = document.getElementById('programs-container');
        const div = document.createElement('div');
        div.className = 'program-item flex items-center space-x-2 mb-2';
        div.innerHTML = `
            <input type="text" name="programs_offered[]" class="flex-1 input-field" placeholder="Enter program name">
            <button type="button" onclick="removeProgram(this)" class="btn-outline px-3 py-2 text-red-600">Remove</button>
        `;
        container.appendChild(div);
    }

    function removeProgram(button) {
        button.parentElement.remove();
    }
</script>
@endsection 