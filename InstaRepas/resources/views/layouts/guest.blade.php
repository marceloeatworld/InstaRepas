<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }} - Connexion | Accédez à votre compte</title>
        
        <!-- Meta tags SEO -->
        <meta name="description" content="Connectez-vous à votre compte InstaRepas pour accéder à vos repas personnalisés et à vos préférences alimentaires. Planifiez vos menus pour la semaine en toute simplicité.">
        <meta name="keywords" content="connexion, login, compte instarepas, repas personnalisés, alimentation équilibrée, planification repas">
        <meta name="author" content="InstaRepas">
        <meta name="robots" content="index, follow">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }} - Connexion à votre compte">
        <meta property="og:description" content="Connectez-vous à votre compte InstaRepas pour accéder à vos repas personnalisés et à vos préférences alimentaires.">
        <meta property="og:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ config('app.name', 'Laravel') }} - Connexion à votre compte">
        <meta property="twitter:description" content="Connectez-vous à votre compte InstaRepas pour accéder à vos repas personnalisés et à vos préférences alimentaires.">
        <meta property="twitter:image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">
        
        <!-- Canonical URL -->
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/custom-login.css">
        <script src="{{ asset('js/7fdee4801e.js') }}"></script>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('imgs/logo_for_foodequlibre.webp') }}" type="image/x-icon"/>
        <link rel="shortcut icon" href="{{ asset('imgs/logo_for_foodequlibre.webp') }}" type="image/x-icon"/>
        
        <!-- Structured Data -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Page de connexion InstaRepas",
            "description": "Connectez-vous à votre compte InstaRepas pour accéder à vos repas personnalisés et à vos préférences alimentaires.",
            "publisher": {
                "@type": "Organization",
                "name": "InstaRepas",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('imgs/logo_for_foodequlibre.webp') }}"
                }
            },
            "mainEntity": {
                "@type": "WebApplication",
                "name": "InstaRepas",
                "applicationCategory": "HealthApplication",
                "operatingSystem": "All"
            }
        }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full text-center">
                <a href="/" title="Retour à l'accueil" aria-label="Logo InstaRepas - Retour à la page d'accueil">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500 inline-block" alt="Logo InstaRepas" />
                </a>
            </div>
            <div class="flex items-stretch">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" role="main" aria-labelledby="login-title">
                    {{ $slot }}
                </div>
                <div class="bg-cover bg-center w-0 sm:w-1/2 sm:max-w-md mt-6 overflow-hidden sm:rounded-lg">
                    <img src="{{ asset('images/image.webp') }}" alt="Alimentation saine et équilibrée - InstaRepas" class="h-full object-cover" width="500" height="700">
                </div>
            </div>
        </div>
    </body>
</html>