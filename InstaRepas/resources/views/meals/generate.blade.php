<x-app-layout
    title="Générateur de menu de la semaine gratuit | InstaRepas"
    description="Créez votre menu de la semaine en quelques clics : repas équilibrés, restrictions alimentaires prises en compte, de 1 à 14 jours. Gratuit et sans inscription."
    :canonical="route('generate')"
>
    <section class="section-shell">
        <div class="mx-auto w-full max-w-3xl">
            <form action="{{ route('generate_meals') }}" method="post" class="surface-panel rounded-[2rem] p-6 sm:p-10" aria-labelledby="meal-generator-title">
                @csrf

                <div class="text-center">
                    <span class="eyebrow">Générateur de menus</span>
                    <h1 id="meal-generator-title" class="mt-4 text-3xl font-semibold text-slate-900 sm:text-4xl">Votre menu de la semaine</h1>
                    <p class="mt-3 text-slate-600">Cochez vos exclusions, choisissez la durée, c'est prêt.</p>
                </div>

                <fieldset class="mt-8">
                    <legend class="field-label">Je ne mange pas</legend>
                    <div class="mt-3 flex flex-wrap gap-2.5">
                        @foreach ($availableDietaryRestrictions as $restriction)
                            <label class="cursor-pointer">
                                <input
                                    type="checkbox"
                                    class="peer sr-only"
                                    name="restrictions[]"
                                    value="{{ $restriction->name }}"
                                    {{ old('days') !== null
                                        ? (in_array($restriction->name, old('restrictions', [])) ? 'checked' : '')
                                        : (in_array($restriction->id, $userPreferences) ? 'checked' : '') }}
                                >
                                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-emerald-600/40 peer-checked:border-transparent peer-checked:bg-emerald-700 peer-checked:text-white peer-focus-visible:ring-2 peer-focus-visible:ring-emerald-600 peer-focus-visible:ring-offset-2">
                                    {{ ucfirst(str_replace('Sans ', '', $displayNames[$restriction->name])) }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset class="mt-8">
                    <legend class="field-label">Durée</legend>
                    <div class="mt-3 flex flex-wrap gap-2.5">
                        @foreach ([1 => '1 jour', 2 => '2 jours', 3 => '3 jours', 5 => '5 jours', 7 => '1 semaine', 14 => '2 semaines'] as $value => $label)
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    class="peer sr-only"
                                    name="days"
                                    value="{{ $value }}"
                                    {{ (int) old('days', 3) === $value ? 'checked' : '' }}
                                >
                                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-emerald-600/40 peer-checked:border-transparent peer-checked:bg-emerald-700 peer-checked:text-white peer-focus-visible:ring-2 peer-focus-visible:ring-emerald-600 peer-focus-visible:ring-offset-2">
                                    {{ $label }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset class="mt-8">
                    <legend class="field-label">Option</legend>
                    <label class="mt-3 inline-flex cursor-pointer">
                        <input type="checkbox" class="peer sr-only" name="include_snacks" value="1" {{ old('include_snacks') ? 'checked' : '' }}>
                        <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-emerald-600/40 peer-checked:border-transparent peer-checked:bg-emerald-700 peer-checked:text-white peer-focus-visible:ring-2 peer-focus-visible:ring-emerald-600 peer-focus-visible:ring-offset-2">
                            Ajouter une collation
                        </span>
                    </label>
                </fieldset>

                <div class="mt-10">
                    <button type="submit" class="insta-button insta-button--primary w-full text-lg">
                        Générer mon menu
                    </button>
                    @guest
                        <p class="mt-4 text-center text-sm text-slate-500">
                            <a href="{{ route('register') }}" class="font-semibold text-emerald-700 hover:text-emerald-800">Créez un compte</a>
                            pour retrouver vos préférences à chaque visite.
                        </p>
                    @else
                        <p class="mt-4 text-center text-sm text-slate-500">Vos préférences enregistrées sont déjà cochées.</p>
                    @endguest
                </div>
            </form>
        </div>
    </section>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
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
