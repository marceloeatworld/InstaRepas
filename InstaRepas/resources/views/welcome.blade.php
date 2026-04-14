<x-app-layout>
    <section class="section-shell pt-8 sm:pt-10 lg:pt-14">
        <div class="home-hero overflow-hidden rounded-[2rem] border border-white/15 shadow-[0_30px_90px_rgba(18,52,49,0.24)]">
            <div class="grid gap-10 px-6 py-8 sm:p-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] lg:p-14">
                <div class="space-y-8">
                    <span class="eyebrow bg-white/10 text-white ring-1 ring-white/15">Menus plus simples au quotidien</span>

                    <div class="space-y-5">
                        <h1 id="hero-title" class="max-w-3xl text-4xl font-semibold text-white sm:text-5xl lg:text-6xl">
                            Composez des repas équilibrés sans y passer toute votre énergie.
                        </h1>
                        <p class="home-hero-copy max-w-2xl text-lg leading-8 sm:text-xl">
                            InstaRepas rassemble génération de menus, préférences alimentaires et repères nutritionnels dans une interface plus claire, plus douce et plus facile à utiliser.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('generate') }}" class="insta-button insta-button--accent">Créer mon menu</a>
                        <a href="#about-instarepas" class="insta-button border-white/20 bg-white/10 text-white hover:bg-white/15">Découvrir le concept</a>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4">
                            <p class="text-sm uppercase tracking-[0.2em] text-white/60">Préférences</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Sauvegardées</p>
                            <p class="mt-2 text-sm text-white/70">Retrouvez vos choix à chaque connexion.</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4">
                            <p class="text-sm uppercase tracking-[0.2em] text-white/60">Menus</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Personnalisés</p>
                            <p class="mt-2 text-sm text-white/70">Un point de départ concret pour la semaine.</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4">
                            <p class="text-sm uppercase tracking-[0.2em] text-white/60">Repères</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Pratiques</p>
                            <p class="mt-2 text-sm text-white/70">Cuisine, nutrition et organisation au même endroit.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <div class="w-full max-w-md rounded-[2rem] border border-white/15 bg-white/10 p-5 backdrop-blur-xl">
                        <div class="rounded-[1.75rem] bg-white/90 p-6 shadow-[0_20px_55px_rgba(14,41,40,0.2)]">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700">Semaine apaisée</p>
                                    <h2 class="mt-2 text-3xl font-semibold text-slate-900">Un cadre simple pour mieux manger</h2>
                                </div>
                                <div class="rounded-[1.5rem] bg-emerald-50 p-3">
                                    <x-application-logo class="h-20 w-20" alt="Logo InstaRepas" />
                                </div>
                            </div>

                            <div class="mt-6 space-y-4">
                                <div class="rounded-[1.25rem] bg-slate-50 p-4">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Ce que vous gagnez</p>
                                    <ul class="mt-3 space-y-2 text-sm text-slate-600">
                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                                            <span>Moins d’hésitation quand vient l’heure du repas.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                                            <span>Des choix plus cohérents avec vos restrictions.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                                            <span>Une base claire pour varier sans repartir de zéro.</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="grid gap-3 sm:grid-cols-2">
                                    <div class="rounded-[1.25rem] border border-slate-200 bg-white p-4">
                                        <p class="text-sm text-slate-500">Entrée conseillée</p>
                                        <p class="mt-2 font-semibold text-slate-900">Menus adaptés & restrictions gérées</p>
                                    </div>
                                    <div class="rounded-[1.25rem] border border-slate-200 bg-white p-4">
                                        <p class="text-sm text-slate-500">Parcours conseillé</p>
                                        <p class="mt-2 font-semibold text-slate-900">Connexion, préférences, génération</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    Au lieu de repartir de zéro chaque semaine, vous avancez avec une structure claire, des préférences déjà connues et une orientation nutritionnelle plus utile.
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-emerald-700">Adapté</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">À votre rythme & vos restrictions</p>
                    </div>
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-amber-600">Pratique</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">Pensé pour le vrai quotidien</p>
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <span class="eyebrow">Votre point de départ</span>
                <h2 class="section-title">Des idées de menus simples, variés et plus faciles à tenir dans le temps.</h2>
                <p class="section-copy">
                    Avec <strong>InstaRepas</strong>, vous obtenez des repas personnalisés qui prennent en compte votre quotidien sans transformer la nutrition en contrainte. L’objectif n’est pas d’être parfait, mais d’être régulier et serein.
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
