@vite(['resources/css/bootstrap.min.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="wrapper sessionWrap">
        <div class="contact-form-wrap">
            <div class="FormTitleImage">Gurukul</div>
            <div class="formField mb-4">
                <label for="email" :value="__('Email')">Email</label>
                <input id="email" class="block mt-1 w-full form-control" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus />
                @if ($errors->has('email'))
                <div class="mt-2 text-start text-danger">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="buttons">
                <button class="btn btnPrimary"> {{ __('Email Password Reset Link') }}</button>
            </div>
            <div class="heading-title">
                <p>{{ __('Forgot your password? Provide your email for a reset link to choose a new one.') }}</p>
            </div>

        </div>
    </div>
</form>