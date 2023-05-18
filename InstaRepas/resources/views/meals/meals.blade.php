<x-app-layout>
    
<div class="w-full p-6 border border-gray-200 rounded-lg shadow flex flex-col items-center justify-center text-center overflow-y-hidden" style="background-color: #082f49;">
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
                
             
               
                    Proteine: {{ $breakfasts[$day]['protein']->name }}<br>

                    Féculent: {{ $breakfasts[$day]['carbohydrate']->preparation_style }}<br>
                    Fruit: {{ $breakfasts[$day]['fruit']->preparation_style }}
                </div>

                <h4 class="text-lg mb-2">Déjeuner</h4>
                <div class="mb-4">
                    Proteine: {{ isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->preparation_style : 'No protein available' }}<br>
                    Féculent: {{ $lunches[$day]['carbohydrate']->preparation_style }}<br>
                    Légumes: {{ $lunches[$day]['vegetable']->preparation_style }}<br>
                   
                </div>
                @if($include_snacks)
                    <h4 class="text-lg mb-2">Snack</h4>
                    <div class="mb-4">
                       
                        Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'No other snack available' }}
                    </div>
                @endif
                <h4 class="text-lg mb-2">Dîner</h4>
                <div class="mb-4">
                    Proteine: {{ isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->preparation_style : 'No protein available' }}<br>
                    Féculent: {{ $dinners[$day]['carbohydrate']->preparation_style }}<br>
                    Légumes: {{ $dinners[$day]['vegetable']->preparation_style }}<br>
                   
                </div>

            </div>
        </div>
    @endfor
</div>


</x-app-layout>

