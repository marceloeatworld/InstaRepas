<x-app-layout>
    <section class="section-shell">
        <div class="page-hero">
            <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_minmax(0,0.95fr)] lg:items-center">
                <div class="space-y-5">
                    <span class="eyebrow">Générateur de menus</span>
                    <h1 class="section-title">Créez un menu plus cohérent avec vos habitudes et vos contraintes.</h1>
                    <p class="section-copy">
                        Sélectionnez vos restrictions alimentaires, indiquez la durée souhaitée et laissez InstaRepas vous donner une base exploitable pour la semaine.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-emerald-700">Simple</p>
                        <p class="mt-3 text-lg font-semibold text-slate-900">Paramètres essentiels seulement</p>
                    </div>
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-amber-600">Utile</p>
                        <p class="mt-3 text-lg font-semibold text-slate-900">Un point de départ clair, sans surcharge</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell pt-0">
        <div class="grid gap-6 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)]">
            <form action="{{ route('generate_meals') }}" method="post" class="surface-panel rounded-[2rem] p-6 sm:p-8" aria-labelledby="meal-generator-title">
                @csrf

                <div class="space-y-2">
                    <span class="eyebrow">Configuration</span>
                    <h2 id="meal-generator-title" class="text-2xl font-semibold text-slate-900">Choisissez votre cadre de génération.</h2>
                    <p class="text-slate-600">Plus vos préférences sont proches de votre réalité, plus le résultat sera directement exploitable.</p>
                </div>

                <fieldset class="mt-8">
                    <legend class="text-lg font-semibold text-slate-900">Restrictions alimentaires</legend>
                    <div class="mt-4 grid gap-3 sm:grid-cols-2">
                        @foreach ($availableDietaryRestrictions as $restriction)
                            <label class="flex cursor-pointer items-start gap-3 rounded-[1.35rem] border border-slate-200 bg-white/90 px-4 py-4 text-slate-700 hover:border-emerald-200 hover:bg-emerald-50/50">
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
                    <div class="mt-4 max-w-xs">
                        <label for="days-input" class="field-label">Durée</label>
                        <input
                            type="number"
                            id="days-input"
                            name="days"
                            min="1"
                            max="14"
                            value="1"
                            class="field-input"
                            aria-describedby="days-help"
                        >
                        <p id="days-help" class="mt-2 text-sm text-slate-500">Choisissez entre 1 et 14 jours.</p>
                    </div>
                </fieldset>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <button type="submit" class="insta-button insta-button--primary">
                        Générer mes repas
                    </button>
                    <a href="{{ route('contact') }}" class="insta-button insta-button--ghost">
                        Besoin d’aide ?
                    </a>
                </div>
            </form>

            <aside class="space-y-6">
                <div class="soft-card">
                    <span class="eyebrow">Conseil</span>
                    <h2 class="mt-5 text-2xl font-semibold text-slate-900">Plus votre profil est précis, plus la base proposée sera utile.</h2>
                    <p class="mt-4 text-slate-600">
                        Si vous avez un compte, pensez à enregistrer vos préférences alimentaires pour éviter de tout reparamétrer à chaque génération.
                    </p>
                    <div class="mt-6 flex flex-col gap-3">
                        <a href="{{ route('register') }}" class="insta-button insta-button--accent">Créer un compte</a>
                        <a href="{{ route('login') }}" class="insta-button insta-button--ghost">Se connecter</a>
                    </div>
                </div>

                <div class="soft-card">
                    <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Ce que le générateur vous apporte</p>
                    <ul class="mt-5 space-y-3 text-slate-600">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                            <span>Un cadre repas rapide à parcourir.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                            <span>Une meilleure continuité entre préférences et résultats.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                            <span>Moins d’effort pour trouver des idées de menus réalistes.</span>
                        </li>
                    </ul>
                </div>
            </aside>
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
