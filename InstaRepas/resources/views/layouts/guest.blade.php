<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'InstaRepas') }} | Connexion & inscription</title>

        <meta
            name="description"
            content="Connectez-vous à InstaRepas pour retrouver vos préférences alimentaires, vos menus et vos outils de planification."
        >
        <meta property="og:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">

        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=source-sans-3:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset('imgs/logo_for_foodequlibre.webp') }}" type="image/x-icon" />

        <script defer src="{{ asset('js/7fdee4801e.js') }}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
    <body class="font-sans antialiased">
        <a href="#main-content" class="skip-link">Aller au contenu</a>

        <main id="main-content" class="section-shell min-h-screen flex items-center">
            <div class="auth-shell w-full">
                <section class="auth-showcase hidden lg:flex lg:flex-col lg:justify-between">
                    <div class="relative z-10 space-y-6">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 text-white">
                            <x-application-logo class="h-14 w-auto" alt="Logo InstaRepas" />
                            <div>
                                <p class="font-display text-2xl font-semibold" translate="no">InstaRepas</p>
                                <p class="text-sm uppercase tracking-[0.28em] text-white/70">Organisation culinaire</p>
                            </div>
                        </a>

                        <div class="max-w-xl space-y-4">
                            <span class="badge-pill bg-white/10 text-white ring-1 ring-white/15">Nutrition plus simple</span>
                            <h1 class="text-4xl font-semibold text-white sm:text-5xl">
                                Des menus pensés pour le quotidien, pas seulement pour la théorie.
                            </h1>
                            <p class="text-lg leading-8 text-white/80">
                                Retrouvez vos préférences, gagnez du temps sur vos choix de repas et gardez une ligne directrice claire chaque semaine.
                            </p>
                        </div>
                    </div>

                    <div class="relative z-10 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4">
                            <p class="text-sm uppercase tracking-[0.22em] text-white/60">Menus</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Plus rapides</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4">
                            <p class="text-sm uppercase tracking-[0.22em] text-white/60">Préférences</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Sauvegardées</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4">
                            <p class="text-sm uppercase tracking-[0.22em] text-white/60">Parcours</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Plus clair</p>
                        </div>
                    </div>
                </section>

                <section class="auth-card mx-auto w-full max-w-2xl">
                    <div class="mb-8 flex items-center justify-between gap-4 lg:hidden">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 text-slate-900">
                            <x-application-logo class="h-12 w-auto" alt="Logo InstaRepas" />
                            <div>
                                <p class="font-display text-xl font-semibold" translate="no">InstaRepas</p>
                                <p class="text-sm text-slate-500">Retour à l’accueil</p>
                            </div>
                        </a>
                    </div>

                    {{ $slot }}
                </section>
            </div>
        </main>

        @stack('scripts')
    </body>
</html>
