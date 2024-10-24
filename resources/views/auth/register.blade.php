<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
@vite(['resources/css/bootstrap.min.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <x-input-label for="First_name" :value="__('First_name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="First_name" :value="old('First_name')" required autofocus autocomplete="First_name" />
        <x-input-error :messages="$errors->get('First_name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="Last_name" :value="__('Last_name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="Last_name" :value="old('Last_name')" required autofocus autocomplete="Last_name" />
        <x-input-error :messages="$errors->get('Last_name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="Phone" :value="__('Phone')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="Phone" :value="old('Phone')" required autofocus autocomplete="Phone" />
        <x-input-error :messages="$errors->get('Phone')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="role" :value="__('Role')" />
        <select id="role" name="role" class="block mt-1 w-full" required>
            <option value="" disabled selected>Select a role</option>
            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
            <option value="principal" {{ old('role') == 'principal' ? 'selected' : '' }}>Principal</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="address" :value="__('Address')" />
        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" class="block mt-1 w-full"
            type="password"
            name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>