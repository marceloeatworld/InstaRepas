@props([
    'title' => config('app.name', 'InstaRepas'),
    'description' => 'InstaRepas vous aide à composer des menus équilibrés, à gérer vos préférences alimentaires et à retrouver des idées utiles pour le quotidien.',
    'canonical' => url()->current(),
    'ogImage' => asset('imgs/logo_for_foodequlibre.webp'),
    'ogType' => 'website',
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
        <meta name="author" content="InstaRepas">
        <meta name="theme-color" content="#fff9f0">

        <meta property="og:type" content="{{ $ogType }}">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:site_name" content="{{ config('app.name', 'InstaRepas') }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:image:alt" content="Logo InstaRepas">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ $canonical }}">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $ogImage }}">
        <meta name="twitter:image:alt" content="Logo InstaRepas">

        <link rel="canonical" href="{{ $canonical }}">
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
            "description": "InstaRepas aide à créer des menus personnalisés, équilibrés et adaptés au quotidien."
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
