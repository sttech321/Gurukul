<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
@vite(['resources/css/bootstrap.min.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])
<form method="POST" action="{{ route('password.store') }}">
    @csrf
    <div class="wrapper sessionWrap">
        <div class="contact-form-wrap">
            <div class="FormTitleImage">Gurukul</div>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="formField">
                <label for="email" :value="__('Email')">Email</label>
                <input id="email" class="block mt-1 w-full form-control" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
                @if ($errors->has('email'))
                <div class="mt-2 text-start text-danger">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="formField">
                <label for="password" :value="__('Password')"> Password </label>
                <input id="password" placeholder="Password" class="block mt-1 w-full form-control" type="password" name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="formField">
                <label for="password_confirmation" :value="__('Confirm Password')"> Password </label>
                <input id="password_confirmation" placeholder="Confirm Password" class="block mt-1 w-full form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="buttons">
                <button class="btn btnPrimary"> {{ __('Reset Password') }}</button>
            </div>

        </div>
    </div>
</form>