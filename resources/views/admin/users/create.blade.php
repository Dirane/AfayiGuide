@extends('layouts.admin')

@section('title', 'Create User')
@section('description', 'Add a new user to the platform')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create User</h1>
            <p class="text-gray-600">Add a new user to the platform</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn-primary">
            Back to Users
        </a>
    </div>

    <div class="card">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="input-field @error('name') border-red-500 @enderror"
                           placeholder="Enter full name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="input-field @error('email') border-red-500 @enderror"
                           placeholder="Enter email address">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role *</label>
                    <select name="role" id="role" required
                            class="input-field @error('role') border-red-500 @enderror">
                        <option value="">Select role</option>
                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="mentor" {{ old('role') == 'mentor' ? 'selected' : '' }}>Mentor</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                           class="input-field @error('phone') border-red-500 @enderror"
                           placeholder="Enter phone number">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}"
                           class="input-field @error('location') border-red-500 @enderror"
                           placeholder="Enter location">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                    <input type="password" name="password" id="password" required
                           class="input-field @error('password') border-red-500 @enderror"
                           placeholder="Enter password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password *</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="input-field @error('password_confirmation') border-red-500 @enderror"
                           placeholder="Confirm password">
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Bio -->
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" id="bio" rows="3"
                          class="input-field @error('bio') border-red-500 @enderror"
                          placeholder="Enter user bio">{{ old('bio') }}</textarea>
                @error('bio')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mentor-specific fields (shown when role is mentor) -->
            <div id="mentor-fields" class="grid grid-cols-1 md:grid-cols-2 gap-6" style="display: none;">
                <div>
                    <label for="expertise" class="block text-sm font-medium text-gray-700">Expertise *</label>
                    <input type="text" name="expertise" id="expertise" value="{{ old('expertise') }}"
                           class="input-field @error('expertise') border-red-500 @enderror"
                           placeholder="Enter expertise area">
                    @error('expertise')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="experience_years" class="block text-sm font-medium text-gray-700">Years of Experience *</label>
                    <input type="number" name="experience_years" id="experience_years" value="{{ old('experience_years') }}" min="0"
                           class="input-field @error('experience_years') border-red-500 @enderror"
                           placeholder="Enter years of experience">
                    @error('experience_years')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hourly_rate" class="block text-sm font-medium text-gray-700">Hourly Rate (XAF) *</label>
                    <input type="number" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate') }}" min="0" step="100"
                           class="input-field @error('hourly_rate') border-red-500 @enderror"
                           placeholder="Enter hourly rate">
                    @error('hourly_rate')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Profile Picture -->
            <div>
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                       class="input-field @error('profile_picture') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload a profile picture (max 2MB)</p>
                @error('profile_picture')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                       {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">
                    Active (user can access the platform)
                </label>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.users.index') }}" class="btn-outline">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create User
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('role').addEventListener('change', function() {
    const mentorFields = document.getElementById('mentor-fields');
    const expertiseField = document.getElementById('expertise');
    const experienceField = document.getElementById('experience_years');
    const hourlyRateField = document.getElementById('hourly_rate');
    
    if (this.value === 'mentor') {
        mentorFields.style.display = 'grid';
        expertiseField.required = true;
        experienceField.required = true;
        hourlyRateField.required = true;
    } else {
        mentorFields.style.display = 'none';
        expertiseField.required = false;
        experienceField.required = false;
        hourlyRateField.required = false;
    }
});

// Trigger on page load if role is already selected
document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.getElementById('role');
    if (roleSelect.value === 'mentor') {
        roleSelect.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection 