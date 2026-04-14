<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <span class="eyebrow">Réinitialisation</span>
            <h1 class="text-3xl font-semibold text-slate-900 sm:text-4xl">Recevez un lien de réinitialisation sans vous perdre dans le parcours.</h1>
            <p class="section-copy">
                Renseignez votre email ou votre nom d’utilisateur et nous vous enverrons les instructions nécessaires pour reprendre l’accès à votre compte.
            </p>
        </div>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="input_type" :value="__('Email ou nom d’utilisateur')" />
                <x-text-input
                    id="input_type"
                    class="mt-1"
                    type="text"
                    name="input_type"
                    :value="old('input_type')"
                    required
                    autofocus
                    autocomplete="username"
                    spellcheck="false"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                <x-input-error :messages="$errors->get('username')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:items-center sm:justify-between">
                <a class="text-sm font-semibold text-emerald-700 hover:text-emerald-800" href="{{ route('login') }}">
                    Revenir à la connexion
                </a>

                <x-primary-button class="w-full sm:w-auto">
                    Envoyer le lien
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
