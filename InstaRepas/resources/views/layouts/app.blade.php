<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'InstaRepas') }} | Menus équilibrés & organisation plus simple</title>

        <meta
            name="description"
            content="InstaRepas vous aide à composer des menus équilibrés, à gérer vos préférences alimentaires et à retrouver des idées utiles pour le quotidien."
        >
        <meta
            name="keywords"
            content="InstaRepas, menus équilibrés, nutrition, planification repas, alimentation saine, préférences alimentaires"
        >
        <meta name="author" content="InstaRepas">
        <meta name="robots" content="index, follow">
        <meta name="theme-color" content="#fff9f0">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ config('app.name', 'InstaRepas') }} | Menus équilibrés & organisation plus simple">
        <meta
            property="og:description"
            content="Découvrez une façon plus simple de générer des menus adaptés à votre quotidien et à vos préférences."
        >
        <meta property="og:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ config('app.name', 'InstaRepas') }} | Menus équilibrés & organisation plus simple">
        <meta
            property="twitter:description"
            content="Planifiez plus sereinement vos repas avec InstaRepas et ses outils d’organisation alimentaire."
        >
        <meta property="twitter:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">

        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=source-sans-3:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset('imgs/logo_for_foodequlibre.webp') }}" type="image/x-icon" />

        <script defer src="https://analytics.aitek.tech/script.js" data-website-id="1bdf5ef9-5cb0-48bd-be70-dfe773863aca"></script>
        <script defer src="{{ asset('js/7fdee4801e.js') }}"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "{{ config('app.name', 'InstaRepas') }}",
            "url": "{{ url('/') }}",
            "description": "InstaRepas aide à créer des menus personnalisés, équilibrés et adaptés au quotidien.",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ url('/search?q={search_term_string}') }}",
                "query-input": "required name=search_term_string"
            }
        }
        </script>
    </head>
    <body class="font-sans antialiased">
        <a href="#main-content" class="skip-link">Aller au contenu</a>

        <div class="min-h-screen">
            @include('layouts.navigation')

            <main id="main-content" class="relative">
                {{ $slot }}
            </main>
        </div>

        @include('layouts.footer')
        @stack('scripts')
    </body>
</html>
