<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <span class="eyebrow">Connexion</span>
            <h1 class="text-3xl font-semibold text-slate-900 sm:text-4xl">Retrouvez vos préférences et vos menus en quelques secondes.</h1>
            <p class="section-copy">
                Connectez-vous pour reprendre là où vous vous êtes arrêté, sans reconfigurer vos choix alimentaires à chaque visite.
            </p>
        </div>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="input_type" :value="__('Email ou nom d’utilisateur')" />
                <x-text-input
                    id="input_type"
                    class="mt-1"
                    type="text"
                    name="input_type"
                    :value="old('input_type')"
                    autofocus
                    autocomplete="username"
                    spellcheck="false"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                <x-input-error :messages="$errors->get('username')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input
                    id="password"
                    class="mt-1"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <label for="remember_me" class="flex cursor-pointer items-center gap-3 rounded-[1.25rem] border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" name="remember">
                <span>Rester connecté sur cet appareil</span>
            </label>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:items-center sm:justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm font-semibold text-emerald-700 hover:text-emerald-800" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif

                <button type="submit" class="insta-button insta-button--primary w-full sm:w-auto">
                    Se connecter
                </button>
            </div>
        </form>

        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50/90 p-4">
            <a
                href="/auth/google/redirect"
                class="flex w-full items-center justify-center gap-3 rounded-full bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-[0_12px_28px_rgba(24,59,58,0.08)] hover:text-slate-900"
            >
                <i class="fab fa-google text-[#4285F4]" aria-hidden="true"></i>
                <span>Continuer avec Google</span>
            </a>
        </div>

        <div class="flex items-center gap-4 text-sm text-slate-500">
            <span class="h-px flex-1 bg-slate-200"></span>
            <span>Pas encore de compte ?</span>
            <span class="h-px flex-1 bg-slate-200"></span>
        </div>

        <a href="{{ route('register') }}" class="insta-button insta-button--accent w-full">
            Créer un compte
        </a>
    </div>
</x-guest-layout>
