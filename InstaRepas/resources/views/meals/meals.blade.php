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
        @php
            // Compose une phrase uniquement avec les éléments disponibles.
            $describeMainMeal = function ($meal) use ($avoid_dairy_styles) {
                if (empty($meal)) {
                    return 'Aucune proposition disponible pour vos critères.';
                }
                $parts = [];
                if (!empty($meal['protein'])) {
                    $parts[] = $meal['protein']->preparation_style;
                }
                if (!empty($meal['carbohydrate'])) {
                    // Les styles "avec une noix de beurre" sont écartés pour les profils sans lactose / végétaliens
                    $parts[] = $avoid_dairy_styles ? $meal['carbohydrate']->name : $meal['carbohydrate']->preparation_style;
                }
                if ($parts === []) {
                    return 'Aucune proposition disponible pour vos critères.';
                }
                $sentence = implode(' et ', $parts);
                if (!empty($meal['vegetable'])) {
                    $sentence .= ', servi avec ' . lcfirst($meal['vegetable']->preparation_style);
                }
                if (!empty($meal['lipid'])) {
                    $sentence .= ', le tout avec un filet d\'' . lcfirst($meal['lipid']->name);
                }
                return $sentence . '.';
            };

            $describeBreakfast = function ($meal) use ($avoid_dairy_styles) {
                if (empty($meal)) {
                    return 'Aucune proposition disponible pour vos critères.';
                }
                $parts = [];
                if (!empty($meal['protein'])) {
                    $parts[] = $meal['protein']->name;
                }
                if (!empty($meal['carbohydrate'])) {
                    $parts[] = $avoid_dairy_styles ? $meal['carbohydrate']->name : $meal['carbohydrate']->preparation_style;
                }
                if ($parts === []) {
                    return 'Aucune proposition disponible pour vos critères.';
                }
                $sentence = implode(', accompagné de ', $parts);
                if (!empty($meal['fruit'])) {
                    $sentence .= " et d'un fruit frais : " . lcfirst($meal['fruit']->preparation_style);
                }
                return $sentence . '.';
            };
        @endphp

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @for($day = 0; $day < count($breakfasts); $day++)
                <article class="soft-card print:shadow-none">
                    <h2 class="text-2xl font-semibold text-slate-900">Jour {{ $day + 1 }}</h2>

                    <div class="mt-6 space-y-5">
                        <section>
                            <h3 class="text-lg font-semibold text-emerald-700">Petit-déjeuner</h3>
                            <p class="mt-2 text-slate-600">{{ $describeBreakfast($breakfasts[$day]) }}</p>
                        </section>

                        <section>
                            <h3 class="text-lg font-semibold text-emerald-700">Déjeuner</h3>
                            <p class="mt-2 text-slate-600">{{ $describeMainMeal($lunches[$day]) }}</p>
                        </section>

                        @if($include_snacks)
                            <section>
                                <h3 class="text-lg font-semibold text-emerald-700">Collation</h3>
                                <p class="mt-2 text-slate-600">
                                    @php
                                        $snackParts = array_filter([
                                            !empty($snacks[$day]['fruit']) ? $snacks[$day]['fruit']->name : null,
                                            !empty($snacks[$day]['other_snack']) ? $snacks[$day]['other_snack']->name : null,
                                        ]);
                                    @endphp
                                    {{ $snackParts !== [] ? implode(' et ', $snackParts) : 'Pas de collation disponible' }}
                                </p>
                            </section>
                        @endif

                        <section>
                            <h3 class="text-lg font-semibold text-emerald-700">Dîner</h3>
                            <p class="mt-2 text-slate-600">{{ $describeMainMeal($dinners[$day]) }}</p>
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
