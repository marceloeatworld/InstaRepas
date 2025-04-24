<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }} - Équilibrez votre alimentation</title>
        
        <!-- Meta tags SEO -->
        <meta name="description" content="FoodEquilibre - Découvrez des conseils personnalisés pour une alimentation équilibrée et saine. Planifiez vos repas selon vos besoins nutritionnels.">
        <meta name="keywords" content="alimentation équilibrée, nutrition, repas sains, diététique, plan alimentaire, foodequilibre">
        <meta name="author" content="FoodEquilibre">
        <meta name="robots" content="index, follow">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }} - Équilibrez votre alimentation">
        <meta property="og:description" content="FoodEquilibre - Découvrez des conseils personnalisés pour une alimentation équilibrée et saine.">
        <meta property="og:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ config('app.name', 'Laravel') }} - Équilibrez votre alimentation">
        <meta property="twitter:description" content="FoodEquilibre - Découvrez des conseils personnalisés pour une alimentation équilibrée et saine.">
        <meta property="twitter:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">
        
        <!-- Canonical URL -->
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset('imgs/logo_for_foodequlibre.webp') }}" type="image/x-icon"/>
        
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        
        <script src="{{ asset('js/anime.min.js') }}" ></script>
        <script defer src="https://analytics.aitek.tech/script.js" data-website-id="1bdf5ef9-5cb0-48bd-be70-dfe773863aca"></script>
                       
        <script src="{{ asset('js/7fdee4801e.js') }}" ></script>
        
        {{-- TAILWIND SCRIPT --}}
        <script src="{{ asset('js/flowbite.min.js') }}"></script>
                
        <!-- <script src="{{ asset('js/js.js') }}"></script> -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Structured Data / Schema.org -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "{{ config('app.name', 'Laravel') }}",
            "url": "{{ url('/') }}",
            "description": "FoodEquilibre - Découvrez des conseils personnalisés pour une alimentation équilibrée et saine.",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ url('/search?q={search_term_string}') }}",
                "query-input": "required name=search_term_string"
            }
        }
        </script>
    </head>
    <body class="font-sans antialiased">
        
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            
            <!-- Page Heading Jai enlever le header
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif-->
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')
        
    </body>
</html>