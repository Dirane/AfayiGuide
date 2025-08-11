<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your profile picture to personalize your account.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.picture.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Current Profile Picture -->
        <div class="flex items-center space-x-6">
            <div class="flex-shrink-0">
                @if($user->profile_picture)
                    <img class="h-24 w-24 rounded-full object-cover border-4 border-gray-200" 
                         src="{{ Storage::url($user->profile_picture) }}" 
                         alt="{{ $user->name }}'s profile picture">
                @else
                    <div class="h-24 w-24 rounded-full bg-primary text-white flex items-center justify-center text-2xl font-bold border-4 border-gray-200">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            
            <div class="flex-1">
                <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                <p class="text-sm text-gray-500">{{ ucfirst($user->role) }}</p>
            </div>
        </div>

        <!-- File Upload -->
        <div>
            <x-input-label for="profile_picture" :value="__('Upload New Picture')" />
            <input type="file" 
                   id="profile_picture" 
                   name="profile_picture" 
                   accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-primary file:text-white
                          hover:file:bg-primary-800
                          file:cursor-pointer" />
            <p class="mt-1 text-sm text-gray-500">
                PNG, JPG, GIF up to 2MB. Recommended size: 400x400 pixels.
            </p>
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <!-- Remove Picture Option -->
        @if($user->profile_picture)
        <div class="flex items-center">
            <input type="checkbox" 
                   id="remove_picture" 
                   name="remove_picture" 
                   value="1"
                   class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="remove_picture" class="ml-2 text-sm text-gray-700">
                Remove current profile picture
            </label>
        </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update Picture') }}</x-primary-button>

            @if (session('status') === 'picture-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('Profile picture updated successfully.') }}</p>
            @endif
        </div>
    </form>
</section> 