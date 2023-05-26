<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full flex justify-center mx-2"></div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="input_type" :value="__('Email or Username')" />
            <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button and Forgot Password Link -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button id="buttonY" type="submit" class="ml-4 px-6 py-2 text-lg cursor-pointer">{{ __('Log in') }}</button>
        </div>
    </form>

    <!-- Google Login Button -->
    <div class="w-full flex justify-center mx-2 mt-4">
        <a href="/auth/google/redirect" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2 cursor-pointer">
            <i class="fab fa-google mr-2"></i> <!-- Google Icon -->
            {{ __('Sign in with Google') }} <!-- Multilingual Text -->
        </a>
    </div>

    <!-- Separator -->
    <div class="separator-container mt-4">
        <hr>
        <span>Vous n'êtes pas inscrit ?</span>
        <hr>
    </div>

    <!-- Register Button -->
    <div class="signup-container mt-4">
        <a id="buttonY" href="{{ route('register') }}" class="w-full px-6 py-2 text-lg cursor-pointer block text-center">
            Créer un compte
        </a>
    </div>

</x-guest-layout>
