<x-app-layout>

<div class="flex flex-wrap h-screen w-full overflow-auto">
    <h1 class="w-full text-center text-3xl pb-4">Meal Plan</h1>
    <p class="w-full text-center pb-2">Date: {{ $current_date }}</p>
    <p class="w-full text-center pb-4">Season: {{ $current_season }}</p>
    @for($day = 0; $day < count($breakfasts); $day++)
        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 flex flex-col">
                <h3 class="text-xl mb-4">Day {{ $day + 1 }}</h3>

                <h4 class="text-lg mb-2">Breakfast</h4>
                <div class="mb-4">
                    Protein: {{ $breakfasts[$day]['protein']->name }}<br>
                    Carbohydrate: {{ $breakfasts[$day]['carbohydrate']->name }}<br>
                    Fruit: {{ $breakfasts[$day]['fruit']->name }}
                </div>

                <h4 class="text-lg mb-2">Lunch</h4>
                <div class="mb-4">
                    Protein: {{ isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->name : 'No protein available' }}<br>
                    Carbohydrate: {{ $lunches[$day]['carbohydrate']->name }}<br>
                    Vegetable: {{ $lunches[$day]['vegetable']->name }}<br>
                    Lipid: {{ $lunches[$day]['lipid']->name }}
                </div>
                @if($include_snacks)
                    <h4 class="text-lg mb-2">Snack</h4>
                    <div class="mb-4">
                        Fruit: {{ $snacks[$day]['fruit'] ? $snacks[$day]['fruit']->name : 'No fruit available' }}<br>
                        Other Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'No other snack available' }}
                    </div>
                @endif
                <h4 class="text-lg mb-2">Dinner</h4>
                <div class="mb-4">
                    Protein: {{ isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->name : 'No protein available' }}<br>
                    Carbohydrate: {{ $dinners[$day]['carbohydrate']->name }}<br>
                    Vegetable: {{ $dinners[$day]['vegetable']->name }}<br>
                    Lipid: {{ $dinners[$day]['lipid']->name }}
                </div>

            </div>
        </div>
    @endfor
</div>


</x-app-layout>

