<x-app-layout>

    <div class="w-full p-3 border border-gray-200 rounded-lg shadow flex flex-col items-center justify-center text-center overflow-y-hidden  bg-gradient-to-r from-blue-900 to-blue-400">
        <h2 class="mb-1 text-3xl font-bold tracking-tight text-white mx-2 tracking-wider">Votre Menu Personnalisé</h2>
        <p class="mb-1 text-lg font-semibold tracking-tight text-white mx-2 tracking-wider">Date: {{ \Carbon\Carbon::parse($current_date)->locale('fr')->isoFormat('LL') }}</p>
        <p class="mb-1 text-lg font-semibold tracking-tight text-white mx-2 tracking-wider">Saison: {{ __('messages.seasons.' . $current_season) }}</p>
    </div>

    <div class="flex flex-wrap h-screen w-full overflow-auto p-6">
        @for($day = 0; $day < count($breakfasts); $day++)
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 flex flex-col space-y-4">
                    <h3 class="text-2xl mb-4 font-semibold text-blue-600">Jour {{ $day + 1 }}</h3>
                    
                    <div>
                        <h4 class="text-xl mb-2 font-semibold text-blue-600">Petit-déjeuner</h4>
                        <p class="text-gray-700">
                            {{ sprintf("%s, accompagné de %s et d'un fruit frais : %s.", 
                                $breakfasts[$day]['protein']->name,
                                $breakfasts[$day]['carbohydrate']->preparation_style,
                                $breakfasts[$day]['fruit']->preparation_style) }}
                        </p>
                    </div>

                    <div>
                        <h4 class="text-xl mb-2 font-semibold text-blue-600">Déjeuner</h4>
                        <p class="text-gray-700">
                            {{ sprintf("%s et %s, servi avec %s.", 
                                isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->preparation_style : 'Aucune protéine',
                                isset($lunches[$day]['carbohydrate']) ? $lunches[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                                isset($lunches[$day]['vegetable']) ? $lunches[$day]['vegetable']->preparation_style : 'Aucun légume') }}
                        </p>
                    </div>

                    @if($include_snacks)
                        <div>
                            <h4 class="text-xl mb-2 font-semibold text-blue-600">Snack</h4>
                            <p class="text-gray-700">
                                Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'Pas de snack disponible' }}
                            </p>
                        </div>
                    @endif
                    
                    <div>
                        <h4 class="text-xl mb-2 font-semibold text-blue-600">Dîner</h4>
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
    
</x-app-layout>
