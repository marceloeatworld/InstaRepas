<x-app-layout
    title="InstaRepas | Menus simples et idées repas personnalisées"
    description="InstaRepas vous aide à générer des idées repas simples, adaptées à vos préférences alimentaires et à votre semaine."
    :canonical="route('home')"
    robots="index, follow, max-image-preview:large"
>
    <section class="section-shell pt-8 sm:pt-10 lg:pt-14">
        <div class="home-hero overflow-hidden rounded-[1.75rem] border border-white/15 shadow-[0_20px_60px_rgba(18,52,49,0.18)]">
            <div class="home-hero-layout">
                <div class="home-hero-content">
                    <span class="eyebrow bg-white/10 text-white ring-1 ring-white/15">Planification repas simple</span>

                    <div class="space-y-3">
                        <h1 id="hero-title" class="home-hero-title">
                            Des idées repas simples pour la semaine.
                        </h1>
                        <p class="home-hero-copy home-hero-lead">
                            Choisissez vos préférences, lancez la génération et partez d’une base claire sans surcharge.
                        </p>
                    </div>

                    <div class="home-hero-actions">
                        <a href="{{ route('generate') }}" class="insta-button insta-button--accent">Créer mon menu</a>
                        <a href="#about-instarepas" class="insta-button border-white/20 bg-white/10 text-white hover:bg-white/15">Découvrir le concept</a>
                    </div>

                    <ul class="home-hero-points" aria-label="Repères principaux">
                        <li class="home-hero-point">
                            <strong>Préférences gardées</strong>
                            <span>Retrouvez vos réglages plus vite.</span>
                        </li>
                        <li class="home-hero-point">
                            <strong>1 à 14 jours</strong>
                            <span>Choisissez seulement la durée utile.</span>
                        </li>
                        <li class="home-hero-point">
                            <strong>Résultat direct</strong>
                            <span>Un point de départ clair pour vos repas.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="about-instarepas" class="section-shell">
        <div class="grid items-center gap-8 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]">
            <div class="page-hero">
                <span class="eyebrow">Pourquoi InstaRepas</span>
                <h2 class="mt-5 text-3xl font-semibold text-slate-900 sm:text-4xl">Une base concrète pour alléger la charge mentale autour des repas.</h2>
                <p class="mt-4 text-lg leading-8 text-slate-600">
                    Au lieu de repartir de zéro chaque semaine, vous avancez avec un cadre stable, des préférences déjà connues et des choix plus faciles à tenir.
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-emerald-700">Clair</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">Moins d’options, plus d’utilité</p>
                    </div>
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-amber-600">Pratique</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">Pensé pour le vrai quotidien</p>
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <span class="eyebrow">Votre point de départ</span>
                <h2 class="section-title">Choisissez peu, avancez plus vite.</h2>
                <p class="section-copy">
                    Avec <strong>InstaRepas</strong>, vous obtenez des repas personnalisés qui tiennent compte de votre quotidien sans transformer la nutrition en contrainte. L’objectif est d’être régulier, pas parfait.
                </p>
                <ul class="grid gap-4 sm:grid-cols-2">
                    <li class="soft-card">
                        <p class="text-lg font-semibold text-slate-900">Préférences mémorisées</p>
                        <p class="mt-2 text-slate-600">Vos choix reviennent automatiquement au lieu d’être ressaisis à chaque visite.</p>
                    </li>
                    <li class="soft-card">
                        <p class="text-lg font-semibold text-slate-900">Parcours guidé</p>
                        <p class="mt-2 text-slate-600">Le site vous emmène vers l’action la plus utile sans surcharge visuelle.</p>
                    </li>
                </ul>
                <div class="flex flex-wrap gap-3">
                    <x-yellow-button href="{{ route('generate') }}">Commencer maintenant</x-yellow-button>
                    <a href="{{ route('register') }}" class="insta-button insta-button--ghost">Créer un compte</a>
                </div>
            </div>
        </div>
    </section>

    <section id="seasonal-foods" class="section-shell">
        <div class="season-showcase overflow-hidden rounded-[2rem] border border-white/60 p-6 shadow-[0_30px_90px_rgba(18,52,49,0.12)] sm:p-8 lg:p-10">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-4">
                    <span class="eyebrow">Saisonnalité</span>
                    <h2 class="section-title">Choisir selon la saison reste l’un des leviers les plus simples pour mieux varier.</h2>
                    <p class="section-copy">
                        Explorez quelques aliments de saison et leurs bienfaits. La sélection s’adapte selon la période pour garder une inspiration utile au moment où vous en avez besoin.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3" aria-label="Choisir une saison">
                    <button type="button" class="season-button is-active" data-season="Automne">Automne</button>
                    <button type="button" class="season-button" data-season="Hiver">Hiver</button>
                    <button type="button" class="season-button" data-season="Printemps">Printemps</button>
                    <button type="button" class="season-button" data-season="Été">Été</button>
                </div>
            </div>

            <div class="season-grid mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-4" role="list" aria-live="polite">
                <article class="food-card" role="listitem">
                    <h3 class="text-lg font-semibold text-slate-900">🍏 Pommes d’automne</h3>
                    <p class="mt-3 text-sm uppercase tracking-[0.18em] text-emerald-700">Automne</p>
                    <p class="mt-3 leading-7 text-slate-600">Riches en fibres et faciles à intégrer dans un quotidien simple, elles accompagnent aussi bien les petits-déjeuners que les desserts légers.</p>
                </article>
                <article class="food-card" role="listitem">
                    <h3 class="text-lg font-semibold text-slate-900">🍄 Champignons</h3>
                    <p class="mt-3 text-sm uppercase tracking-[0.18em] text-emerald-700">Automne</p>
                    <p class="mt-3 leading-7 text-slate-600">Une base intéressante pour varier les textures, enrichir les plats chauds et soutenir un équilibre plus végétal.</p>
                </article>
                <article class="food-card" role="listitem">
                    <h3 class="text-lg font-semibold text-slate-900">🌰 Châtaignes</h3>
                    <p class="mt-3 text-sm uppercase tracking-[0.18em] text-emerald-700">Automne</p>
                    <p class="mt-3 leading-7 text-slate-600">Elles apportent une sensation de satiété agréable et une vraie touche saisonnière aux plats comme aux collations.</p>
                </article>
                <article class="food-card" role="listitem">
                    <h3 class="text-lg font-semibold text-slate-900">🍐 Poires</h3>
                    <p class="mt-3 text-sm uppercase tracking-[0.18em] text-emerald-700">Automne</p>
                    <p class="mt-3 leading-7 text-slate-600">Un fruit simple et accessible pour équilibrer les repas, les desserts ou les pauses goûter sans complication.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="personnalisation" class="section-shell">
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="page-hero lg:col-span-2">
                <span class="eyebrow">Personnalisation utile</span>
                <h2 class="mt-5 text-3xl font-semibold text-slate-900 sm:text-4xl">Des repas alignés avec votre mode de vie, pas l’inverse.</h2>
                <p class="mt-4 text-lg leading-8 text-slate-600">
                    Que vous soyez végétarien, sans gluten ou simplement en recherche d’un cadre plus stable, InstaRepas conserve vos préférences pour vous faire gagner du temps à chaque retour.
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-3">
                    <div class="soft-card">
                        <p class="text-lg font-semibold text-slate-900">Végétal</p>
                        <p class="mt-2 text-slate-600">Une base plus simple pour composer sans vous répéter.</p>
                    </div>
                    <div class="soft-card">
                        <p class="text-lg font-semibold text-slate-900">Sans gluten</p>
                        <p class="mt-2 text-slate-600">Moins d’oubli dans les choix du quotidien.</p>
                    </div>
                    <div class="soft-card">
                        <p class="text-lg font-semibold text-slate-900">Sur mesure</p>
                        <p class="mt-2 text-slate-600">Des préférences gardées en mémoire pour repartir plus vite.</p>
                    </div>
                </div>
            </div>

            <div class="soft-card flex flex-col justify-between">
                <div>
                    <span class="eyebrow">Prochaine étape</span>
                    <h2 class="mt-5 text-2xl font-semibold text-slate-900">Créez un compte pour retrouver vos réglages et accélérer vos prochaines générations.</h2>
                </div>
                <div class="mt-8 flex flex-col gap-3">
                    <x-yellow-button href="{{ route('register') }}">Créer mon compte</x-yellow-button>
                    <a href="{{ route('login') }}" class="insta-button insta-button--ghost">J’ai déjà un compte</a>
                </div>
            </div>
        </div>
    </section>

    <section id="notre-histoire" class="section-shell pt-2">
        <div class="page-hero">
            <div class="grid gap-8 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:items-center">
                <div class="space-y-4">
                    <span class="eyebrow">Notre histoire</span>
                    <h2 class="section-title">Une idée née du terrain, des habitudes réelles et du besoin de mieux guider les choix du quotidien.</h2>
                </div>

                <div class="space-y-4 text-lg leading-8 text-slate-600">
                    <p>
                        InstaRepas est né de l’envie de rapprocher nutrition et usage concret. Avec la diététicienne Aurélie Marino, l’équipe a constaté une difficulté récurrente: beaucoup de personnes manquent surtout d’idées simples et viables pour leurs repas de tous les jours.
                    </p>
                    <p>
                        Le projet propose donc une base plus directe: moins de friction, plus de continuité, et des menus qui soutiennent vraiment une organisation alimentaire plus stable.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <x-yellow-button href="{{ route('contact') }}">Parler avec nous</x-yellow-button>
                        <a href="{{ url('/a-propos') }}" class="insta-button insta-button--ghost">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script defer src="{{ asset('js/anime.min.js') }}"></script>
        <script defer src="{{ asset('js/season.js') }}"></script>
    @endpush

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "InstaRepas",
        "url": "{{ url('/') }}",
        "description": "Plateforme de création de repas personnalisés et équilibrés pour la semaine"
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "InstaRepas",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('imgs/logo_for_foodequlibre.webp') }}",
        "founder": {
            "@type": "Person",
            "name": "Aurélie Marino",
            "jobTitle": "Diététicienne"
        }
    }
    </script>
</x-app-layout>
