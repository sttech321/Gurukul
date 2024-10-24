<section class="updatePasswordProfile profileSection">
    <div class="secHeading mb-4">
        <h5 class="title mb-2"> {{ __('Update Password') }}</h5>
        <p> {{ __('Ensure your account is using a long, random password to stay secure.') }} </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="formField mb-4">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input type="password" id="update_password_current_password" name="current_password" placeholder="Password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div class="formField mb-4">
            <label for="update_password_password" class="form-label">New Password</label>
            <input type="password" id="update_password_password" name="password" placeholder="New Password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div class="formField mb-4">
            <label for="update_password_password_confirmation" :value="__('Confirm Password')" class="form-label">Confirm Password</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary btn-md">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>