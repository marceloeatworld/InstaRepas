<x-app-layout>
    
<div class="w-full p-6 border border-gray-200 rounded-lg shadow flex flex-col items-center justify-center text-center overflow-y-hidden" style="background-color: #6495ED;;">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Plan alimentaire</h5>
    <p class="mb-2 text-sm font-bold tracking-tight text-white mx-4 tracking-wider">Date: {{ \Carbon\Carbon::parse($current_date)->locale('fr')->isoFormat('LL') }}</p>
    <p class="mb-2 text-sm font-bold tracking-tight text-white mx-4 tracking-wider">Saison: {{ __('messages.seasons.' . $current_season) }}</p>
</div>



<div class="flex flex-wrap h-screen w-full overflow-auto">
    
    @for($day = 0; $day < count($breakfasts); $day++)
        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 flex flex-col">
                <h3 class="text-xl mb-4">Jour {{ $day + 1 }}</h3>

                <h4 class="text-lg mb-2">Petit-déjeuner</h4>
                <div class="mb-4">
                    {{ sprintf("%s, accompagné de %s et d'un fruit frais : %s.", 
                        $breakfasts[$day]['protein']->name,
                        $breakfasts[$day]['carbohydrate']->preparation_style,
                        $breakfasts[$day]['fruit']->preparation_style) }}
                </div>


                <h4 class="text-lg mb-2">Déjeuner</h4>
                    <div class="mb-4">
                        {{ sprintf("%s et %s, servi avec %s.", 
                            isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->preparation_style : 'Aucune protéine',
                            isset($lunches[$day]['carbohydrate']) ? $lunches[$day]['carbohydrate']->preparation_style : 'Aucun glucide',
                            isset($lunches[$day]['vegetable']) ? $lunches[$day]['vegetable']->preparation_style : 'Aucun légume') }}
                    </div>


                @if($include_snacks)
                    <h4 class="text-lg mb-2">Snack</h4>
                    <div class="mb-4">
                       
                        Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'No other snack available' }}
                    </div>
                @endif
                <h4 class="text-lg mb-2">Dîner</h4>
                <div class="mb-4">
                    {{ sprintf("%s et %s, servi avec %s.", 
                        isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->preparation_style : 'Aucune protéine',
                        $dinners[$day]['carbohydrate']->preparation_style,
                        $dinners[$day]['vegetable']->preparation_style) }}
                </div>


            </div>
        </div>
    @endfor
</div>


</x-app-layout>

