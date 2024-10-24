@vite(['resources/css/app.css', 'resources/css/bootstrap.min.css', 'resources/css/pages.css', 'resources/css/sidebar.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="wrapper sessionWrap">
        <div class="contact-form-wrap">
            <div class="FormTitleImage">Gurukul</div>
            <div class="formField">
                <label for="userId" :value="__('userId')"> User Id</label>
                <input id="userId" class="block mt-1 w-full font-control" type="text" name="userId" placeholder="User Id" autocomplete="current-password" />
            </div>
            <div class="formField">
                <label for="email" :value="__('Email')">Email</label>
                <input id="email" class="block mt-1 w-full font-control" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="formField">
                <label for="password" :value="__('Password')"> Password </label>
                <input id="password" placeholder="Password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flexBetween mb-4 mt-3">
                <div class="form-check rememberMeText">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">
                        {{ __('Remember me') }}
                    </label>
                </div>
                <div class="flex items-center justify-end bottomLineContent">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"> {{ __('Forgot your password?') }} </a>
                    @endif
                </div>
            </div>
            <div class="buttons">
                <button class="btn btnPrimary"> {{ __('Log in') }}</button>
            </div>

        </div>
    </div>
</form>