<x-app-layout>
    <div class="py-6">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg text-center border-b-2 border-blue-600 shadow-md transition-all duration-500 hover:shadow-lg">
        <p class="mb-1 text-sm font-semibold tracking-tight text-blue-700 tracking-wider">Date: {{ \Carbon\Carbon::parse($current_date)->locale('fr')->isoFormat('LL') }}</p>
        <p class="mb-1 text-sm font-semibold tracking-tight text-blue-700 tracking-wider">Saison: {{ __('messages.seasons.' . $current_season) }}</p>
        <div class="mt-2 flex justify-center">
        <button id="buttonF" onclick="window.print()" class="hide-on-mobile md:block bg-blue-600 hover:bg-blue-500 font-bold py-2 px-4 rounded inline-flex items-center">
    <i class="fas fa-print mr-2"></i>
    Imprimer la page
</button>


        </div>
    </div>
</div>




    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 p-6 overflow-auto">
        @for($day = 0; $day < count($breakfasts); $day++)
            <div class="p-4 w-full">
                <div class="bg-white shadow-xl rounded-xl p-6 flex flex-col space-y-6">
                    <h3 class="text-2xl mb-4 font-semibold text-blue-600">Jour {{ $day + 1 }}</h3>
                    
                    <div>
                        <h4 class="text-lg mb-2 font-semibold text-blue-600">Petit-déjeuner</h4>
                        <p class="text-gray-700">
                            {{ sprintf("%s, accompagné de %s et d'un fruit frais : %s.", 
                                $breakfasts[$day]['protein']->name,
                                $breakfasts[$day]['carbohydrate']->preparation_style,
                                $breakfasts[$day]['fruit']->preparation_style) }}
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg mb-2 font-semibold text-blue-600">Déjeuner</h4>
                        <p class="text-gray-700">
                            {{ sprintf("%s et %s, servi avec %s.", 
                                isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->preparation_style : 'Aucune protéine',
                                isset($lunches[$day]['carbohydrate']) ? $lunches[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                                isset($lunches[$day]['vegetable']) ? $lunches[$day]['vegetable']->preparation_style : 'Aucun légume') }}
                        </p>
                    </div>

                    @if($include_snacks)
                        <div>
                            <h4 class="text-lg mb-2 font-semibold text-blue-600">Snack</h4>
                            <p class="text-gray-700">
                                Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'Pas de snack disponible' }}
                            </p>
                        </div>
                    @endif
                    
                    <div>
                        <h4 class="text-lg mb-2 font-semibold text-blue-600">Dîner</h4>
                        <p class="text-gray-700">
                            {{ sprintf("%s et %s, servi avec %s.", 
                                isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->preparation_style : 'Aucune protéine',
                                isset($dinners[$day]['carbohydrate']) ? $dinners[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                                isset($dinners[$day]['vegetable']) ? $dinners[$day]['vegetable']->preparation_style : 'Aucun légume') }}
                        </p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <style>
    @media print {
        /* Supprimer les ombres */
        .shadow-md, .hover\:shadow-lg, .shadow-xl {
            box-shadow: none !important;
        }
        
        /* Supprimer les couleurs de fond */
        .bg-white, .bg-blue-600, .hover\:bg-blue-500 {
            background-color: transparent !important;
        }

        /* Supprimer les bordures */
        .border-b-2, .border-blue-600 {
            border: none !important;
        }

        /* Réduire les marges et les remplissages */
        .mb-2, .mb-6, .mb-4, .p-6, .py-2, .px-4, .p-4 {
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Réduire l'espacement entre les lignes */
        p, h3, h4, h5 {
            line-height: 1.2 !important;
        }

        /* Réduire l'espacement entre les éléments de grille */
        .grid-cols-1, .md\:grid-cols-2, .xl\:grid-cols-3 {
            grid-gap: 0 !important;
        }

        .gap-6 {
            gap: 0 !important;
        }
    }
</style>


</x-app-layout>