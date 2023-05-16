<x-app-layout>

<div class="flex flex-col items-center justify-center bg-gray-100">
  <div class="bg-white rounded-lg p-8 shadow-md">
    <h1 class="text-3xl pb-4">Plan alimentaire</h1>
    <p class="pb-2">Date: {{ $current_date }}</p>
    <p class="pb-4">Saison: {{ $current_season }}</p>
  </div>
</div>


<div class="flex flex-wrap h-screen w-full overflow-auto">
    
    @for($day = 0; $day < count($breakfasts); $day++)
        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 flex flex-col">
                <h3 class="text-xl mb-4">Jour {{ $day + 1 }}</h3>

                <h4 class="text-lg mb-2">Petit-déjeuner</h4>
                <div class="mb-4">
                    Proteine: {{ $breakfasts[$day]['protein']->name }}<br>
                    Féculent: {{ $breakfasts[$day]['carbohydrate']->name }}<br>
                    Fruit: {{ $breakfasts[$day]['fruit']->name }}
                </div>

                <h4 class="text-lg mb-2">Déjeuner</h4>
                <div class="mb-4">
                    Protein: {{ isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->name : 'No protein available' }}<br>
                    Féculent: {{ $lunches[$day]['carbohydrate']->name }}<br>
                    Légumes: {{ $lunches[$day]['vegetable']->name }}<br>
                   
                </div>
                @if($include_snacks)
                    <h4 class="text-lg mb-2">Snack</h4>
                    <div class="mb-4">
                       
                        Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'No other snack available' }}
                    </div>
                @endif
                <h4 class="text-lg mb-2">Dîner</h4>
                <div class="mb-4">
                    Protein: {{ isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->name : 'No protein available' }}<br>
                    Féculent: {{ $dinners[$day]['carbohydrate']->name }}<br>
                    Légumes: {{ $dinners[$day]['vegetable']->name }}<br>
                   
                </div>

            </div>
        </div>
    @endfor
</div>


</x-app-layout>

