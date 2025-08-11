<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Account Security') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Manage your account security settings and preferences.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <!-- Two-Factor Authentication -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-md font-medium text-gray-900">Two-Factor Authentication</h3>
                    <p class="text-sm text-gray-600">Add an extra layer of security to your account</p>
                </div>
                <div class="flex items-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                        Not Enabled
                    </span>
                    <button type="button" class="ml-3 btn-primary text-sm px-4 py-2">
                        Enable 2FA
                    </button>
                </div>
            </div>
        </div>

        <!-- Login Sessions -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-md font-medium text-gray-900">Active Sessions</h3>
                    <p class="text-sm text-gray-600">Manage your active login sessions</p>
                </div>
                <button type="button" class="btn-outline text-sm px-4 py-2">
                    View Sessions
                </button>
            </div>
        </div>

        <!-- Email Verification Status -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-md font-medium text-gray-900">Email Verification</h3>
                    <p class="text-sm text-gray-600">
                        @if($user->email_verified_at)
                            Your email is verified
                        @else
                            Please verify your email address
                        @endif
                    </p>
                </div>
                <div class="flex items-center">
                    @if($user->email_verified_at)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Verified
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Not Verified
                        </span>
                        <form method="post" action="{{ route('verification.send') }}" class="ml-3">
                            @csrf
                            <button type="submit" class="btn-primary text-sm px-4 py-2">
                                Resend Verification
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Account Activity -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-md font-medium text-gray-900">Account Activity</h3>
                    <p class="text-sm text-gray-600">View your recent account activity</p>
                </div>
                <button type="button" class="btn-outline text-sm px-4 py-2">
                    View Activity
                </button>
            </div>
        </div>

        <!-- Privacy Settings -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-md font-medium text-gray-900">Privacy Settings</h3>
                    <p class="text-sm text-gray-600">Control who can see your profile information</p>
                </div>
                <button type="button" class="btn-outline text-sm px-4 py-2">
                    Manage Privacy
                </button>
            </div>
        </div>
    </div>
</section> 