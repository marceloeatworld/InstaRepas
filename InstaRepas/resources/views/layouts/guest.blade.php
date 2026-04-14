@props([
    'title' => config('app.name', 'InstaRepas') . ' | Connexion & inscription',
    'description' => 'Connectez-vous à InstaRepas pour retrouver vos préférences alimentaires, vos menus et vos outils de planification.',
    'canonical' => url()->current(),
    'ogImage' => asset('imgs/logo_for_foodequlibre.webp'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <meta
            name="description"
            content="{{ $description }}"
        >
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ $canonical }}">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $ogImage }}">

        <link rel="canonical" href="{{ $canonical }}">
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
                                <p class="text-sm uppercase tracking-[0.22em] text-white/70">Accès rapide</p>
                            </div>
                        </a>

                        <div class="max-w-xl space-y-4">
                            <span class="badge-pill bg-white/10 text-white ring-1 ring-white/15">Nutrition plus simple</span>
                            <h1 class="text-4xl font-semibold text-white sm:text-5xl">
                                Connectez-vous et retrouvez vos choix sans repartir de zéro.
                            </h1>
                            <p class="text-lg leading-8 text-white/80">
                                Préférences, menus et repères restent au même endroit pour avancer plus vite au quotidien.
                            </p>
                        </div>
                    </div>

                    <ul class="relative z-10 space-y-3 text-white/78">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-300" aria-hidden="true"></i>
                            <span>Préférences retrouvées automatiquement.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-300" aria-hidden="true"></i>
                            <span>Menus plus rapides à relancer.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-300" aria-hidden="true"></i>
                            <span>Parcours plus direct.</span>
                        </li>
                    </ul>
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
