<x-app-layout
    title="Générateur de menus | InstaRepas"
    description="Générez un menu simple selon vos préférences et restrictions alimentaires avec l’outil InstaRepas."
    :canonical="route('generate')"
    robots="index, follow"
>
    <section class="section-shell pb-6 sm:pb-8">
        <div class="menu-generator-shell">
            <div class="menu-generator-hero">
                <span class="eyebrow">Générateur de menus</span>
                <h1 class="menu-generator-title">Générez un menu simple, centré sur l’essentiel.</h1>
                <p class="menu-generator-copy">
                    Choisissez vos restrictions, indiquez le nombre de jours et laissez InstaRepas vous proposer une base claire pour démarrer la semaine.
                </p>
                <div class="menu-generator-points" aria-label="Repères rapides">
                    <span>Restrictions prises en compte</span>
                    <span>1 à 14 jours</span>
                    <span>Résultat direct</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell pt-0">
        <div class="menu-generator-shell">
            <form action="{{ route('generate_meals') }}" method="post" class="surface-panel menu-generator-form" aria-labelledby="meal-generator-title">
                @csrf

                <div class="menu-generator-form__header">
                    <div class="space-y-2">
                        <span class="eyebrow">Configuration</span>
                        <h2 id="meal-generator-title" class="text-2xl font-semibold text-slate-900 sm:text-3xl">Votre cadre de génération</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-6 text-slate-500 sm:text-base">
                        Le formulaire reste volontairement court: quelques choix suffisent pour obtenir un point de départ cohérent.
                    </p>
                </div>

                <div class="menu-generator-steps" aria-label="Étapes du générateur">
                    <div class="menu-generator-step">
                        <span class="menu-generator-step__number">1</span>
                        <div>
                            <p class="font-semibold text-slate-900">Choisissez vos restrictions</p>
                            <p class="text-sm text-slate-500">Seulement ce qui influence vraiment le menu.</p>
                        </div>
                    </div>
                    <div class="menu-generator-step">
                        <span class="menu-generator-step__number">2</span>
                        <div>
                            <p class="font-semibold text-slate-900">Indiquez la durée</p>
                            <p class="text-sm text-slate-500">Entre 1 et 14 jours.</p>
                        </div>
                    </div>
                    <div class="menu-generator-step">
                        <span class="menu-generator-step__number">3</span>
                        <div>
                            <p class="font-semibold text-slate-900">Lancez la génération</p>
                            <p class="text-sm text-slate-500">Vous obtenez une base simple à exploiter.</p>
                        </div>
                    </div>
                </div>

                <fieldset class="mt-8">
                    <legend class="text-lg font-semibold text-slate-900">Restrictions alimentaires</legend>
                    <p class="mt-2 text-sm text-slate-500">Cochez uniquement les exclusions qui doivent être respectées.</p>
                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach ($availableDietaryRestrictions as $restriction)
                            <label class="menu-generator-option">
                                <input
                                    type="checkbox"
                                    class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500"
                                    name="restrictions[]"
                                    value="{{ $restriction->name }}"
                                    {{ in_array($restriction->id, $userPreferences) ? 'checked' : '' }}
                                    aria-describedby="restriction-desc-{{ $restriction->id }}"
                                >
                                <span>
                                    <span class="block font-semibold text-slate-900">{{ $displayNames[$restriction->name] }}</span>
                                    <span id="restriction-desc-{{ $restriction->id }}" class="mt-1 block text-sm text-slate-500">
                                        Exclure cette catégorie de vos propositions de repas.
                                    </span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset class="mt-8">
                    <legend class="text-lg font-semibold text-slate-900">Nombre de jours</legend>
                    <div class="menu-duration-card mt-4">
                        <div class="space-y-1">
                            <label for="days-input" class="field-label">Durée</label>
                            <p class="text-sm text-slate-500">Définissez la période que vous voulez couvrir.</p>
                        </div>
                        <div class="w-full max-w-[11rem]">
                            <input
                                type="number"
                                id="days-input"
                                name="days"
                                min="1"
                                max="14"
                                value="1"
                                inputmode="numeric"
                                class="field-input text-center text-lg font-semibold"
                                aria-describedby="days-help"
                            >
                        </div>
                    </div>
                    <p id="days-help" class="mt-3 text-sm text-slate-500">Choisissez entre 1 et 14 jours.</p>
                </fieldset>

                @guest
                    <div class="menu-generator-note">
                        <div>
                            <p class="font-semibold text-slate-900">Vous voulez garder vos préférences ?</p>
                            <p class="mt-1 text-sm text-slate-500">Un compte permet de retrouver vos choix sans tout reconfigurer à chaque fois.</p>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <a href="{{ route('register') }}" class="insta-button insta-button--accent">Créer un compte</a>
                            <a href="{{ route('login') }}" class="insta-button insta-button--ghost">Se connecter</a>
                        </div>
                    </div>
                @else
                    <div class="menu-generator-note">
                        <div>
                            <p class="font-semibold text-slate-900">Profil connecté</p>
                            <p class="mt-1 text-sm text-slate-500">Vos préférences enregistrées seront déjà prises en compte si votre profil est à jour.</p>
                        </div>
                    </div>
                @endguest

                <div class="mt-8 flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-center">
                    <button type="submit" class="insta-button insta-button--primary min-w-[14rem]">
                        Générer mes repas
                    </button>
                    <a href="{{ route('contact') }}" class="insta-button insta-button--ghost min-w-[12rem]">
                        Besoin d’aide ?
                    </a>
                </div>
            </form>
        </div>
    </section>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Générateur de repas personnalisés - InstaRepas",
        "description": "Générez des repas adaptés à vos préférences alimentaires et restrictions diététiques avec InstaRepas.",
        "mainEntity": {
            "@type": "WebApplication",
            "name": "Générateur de menus InstaRepas",
            "applicationCategory": "LifestyleApplication",
            "operatingSystem": "Web",
            "offers": {
                "@type": "Offer",
                "price": "0",
                "priceCurrency": "EUR"
            }
        }
    }
    </script>
</x-app-layout>
