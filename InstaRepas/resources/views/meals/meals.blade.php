<x-app-layout>
    <section class="section-shell">
        <div class="mx-auto max-w-3xl">
            <div class="page-hero text-center">
                <span class="eyebrow">Résultat</span>
                <h1 class="mt-5 text-3xl font-semibold text-slate-900 sm:text-4xl">Votre plan repas est prêt.</h1>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-3 text-sm text-slate-600">
                    <span class="badge-pill">Date: {{ \Carbon\Carbon::parse($current_date)->locale('fr')->isoFormat('LL') }}</span>
                    <span class="badge-pill">Saison: {{ __('messages.seasons.' . $current_season) }}</span>
                </div>
                <div class="mt-6 flex justify-center">
                    <button type="button" onclick="window.print()" class="insta-button insta-button--ghost hidden md:inline-flex hide-on-mobile">
                        <i class="fas fa-print" aria-hidden="true"></i>
                        <span>Imprimer la page</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell pt-0">
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @for($day = 0; $day < count($breakfasts); $day++)
                <article class="soft-card print:shadow-none">
                    <h2 class="text-2xl font-semibold text-slate-900">Jour {{ $day + 1 }}</h2>

                    <div class="mt-6 space-y-5">
                        <section>
                            <h3 class="text-lg font-semibold text-emerald-700">Petit-déjeuner</h3>
                            <p class="mt-2 text-slate-600">
                                {{ sprintf("%s, accompagné de %s et d'un fruit frais : %s.",
                                    isset($breakfasts[$day]['protein']) ? $breakfasts[$day]['protein']->name : 'Aucune protéine',
                                    isset($breakfasts[$day]['carbohydrate']) ? $breakfasts[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                                    isset($breakfasts[$day]['fruit']) ? $breakfasts[$day]['fruit']->preparation_style : 'Aucun fruit'
                                ) }}
                            </p>
                        </section>

                        <section>
                            <h3 class="text-lg font-semibold text-emerald-700">Déjeuner</h3>
                            <p class="mt-2 text-slate-600">
                                {{ sprintf("%s et %s, servi avec %s.",
                                    isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->preparation_style : 'Aucune protéine',
                                    isset($lunches[$day]['carbohydrate']) ? $lunches[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                                    isset($lunches[$day]['vegetable']) ? $lunches[$day]['vegetable']->preparation_style : 'Aucun légume'
                                ) }}
                            </p>
                        </section>

                        @if($include_snacks)
                            <section>
                                <h3 class="text-lg font-semibold text-emerald-700">Collation</h3>
                                <p class="mt-2 text-slate-600">
                                    {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'Pas de collation disponible' }}
                                </p>
                            </section>
                        @endif

                        <section>
                            <h3 class="text-lg font-semibold text-emerald-700">Dîner</h3>
                            <p class="mt-2 text-slate-600">
                                {{ sprintf("%s et %s, servi avec %s.",
                                    isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->preparation_style : 'Aucune protéine',
                                    isset($dinners[$day]['carbohydrate']) ? $dinners[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                                    isset($dinners[$day]['vegetable']) ? $dinners[$day]['vegetable']->preparation_style : 'Aucun légume'
                                ) }}
                            </p>
                        </section>
                    </div>
                </article>
            @endfor
        </div>
    </section>

    <style>
        @media print {
            nav,
            footer,
            .hide-on-mobile {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .page-hero,
            .soft-card {
                box-shadow: none !important;
                border: 1px solid #d7d7d7 !important;
                background: white !important;
            }
        }
    </style>
</x-app-layout>
