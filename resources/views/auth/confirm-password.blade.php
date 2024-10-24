<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
@vite(['resources/css/bootstrap.min.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="wrapper sessionWrap">
        <div class="contact-form-wrap">
            <div class="FormTitleImage">Gurukul</div>
            <div class="formField mb-4">
                <label for="password" :value="__('Password')"> Password </label>
                <input id="password" placeholder="Password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="buttons">
                <button class="btn btnPrimary"> {{ __('Confirm') }}</button>
            </div>
            <div class="heading-title">
                <p>{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
            </div>

        </div>
    </div>
</form>