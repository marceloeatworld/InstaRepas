<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <span class="eyebrow">Inscription</span>
            <h1 class="text-3xl font-semibold text-slate-900 sm:text-4xl">Créez votre espace pour garder vos préférences et accélérer vos prochains menus.</h1>
            <p class="section-copy">
                L’inscription vous permet de retrouver vos réglages plus vite et de rendre la génération de repas plus fluide à chaque passage.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="username" :value="__('Nom d’utilisateur')" />
                <x-text-input
                    id="username"
                    class="mt-1"
                    type="text"
                    name="username"
                    :value="old('username')"
                    required
                    autofocus
                    autocomplete="username"
                    spellcheck="false"
                />
                <x-input-error :messages="$errors->get('username')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="mt-1"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    spellcheck="false"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input
                    id="password"
                    class="mt-1"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input
                    id="password_confirmation"
                    class="mt-1"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:items-center sm:justify-between">
                <a class="text-sm font-semibold text-emerald-700 hover:text-emerald-800" href="{{ route('login') }}">
                    J’ai déjà un compte
                </a>

                <button type="submit" class="insta-button insta-button--primary w-full sm:w-auto">
                    Créer mon compte
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
    </div>
</x-guest-layout>
