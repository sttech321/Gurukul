<section class="updateProfile profileSection">
    <div class="secHeading mb-4">
        <h5 class="title mb-2">{{ __('Profile Information') }} </h5>
        <p>{{ __("Update your account's profile information and email address.") }} </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="formField mb-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" :value="old('name', $user->name)" placeholder="Name" required class="form-control" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="formField mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" :value="old('email', $user->email)" placeholder="Email" class="form-control" required autocomplete="username" />
            @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p>
                    {{ __('Your email address is unverified.') }}

                    <button class="btn btn-primary btn-md" form="send-verification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p>
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary btn-md">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>