<x-app-layout>

<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
  <h1 class="text-2xl font-bold mb-2">Meal Plan</h1>
  <p class="mb-2">Date: {{ $current_date }}</p>
  <p class="mb-4">Season: {{ $current_season }}</p>
  @for($day = 0; $day < count($breakfasts); $day++)
    <div class="bg-gray-100 p-4 rounded-lg my-4">
      <h3 class="text-xl font-bold mb-2">Day {{ $day + 1 }}</h3>

      <h4 class="text-lg font-semibold mb-1">Breakfast</h4>
      <div class="mb-2">
        Protein: {{ $breakfasts[$day]['protein']->name }}<br>
        Carbohydrate: {{ $breakfasts[$day]['carbohydrate']->name }}<br>
        Fruit: {{ $breakfasts[$day]['fruit']->name }}
      </div>

      <h4 class="text-lg font-semibold mb-1">Lunch</h4>
      <div class="mb-2">
        Protein: {{ isset($lunches[$day]['protein']) ? $lunches[$day]['protein']->name : 'No protein available' }}<br>
        Carbohydrate: {{ $lunches[$day]['carbohydrate']->name }}<br>
        Vegetable: {{ $lunches[$day]['vegetable']->name }}<br>
        Lipid: {{ $lunches[$day]['lipid']->name }}
      </div>

      @if($include_snacks)
        <h4 class="text-lg font-semibold mb-1">Snack</h4>
        <div class="mb-2">
          Fruit: {{ $snacks[$day]['fruit'] ? $snacks[$day]['fruit']->name : 'No fruit available' }}<br>
          Other Snack: {{ $snacks[$day]['other_snack'] ? $snacks[$day]['other_snack']->name : 'No other snack available' }}
        </div>
      @endif

      <h4 class="text-lg font-semibold mb-1">Dinner</h4>
      <div>
        Protein: {{ isset($dinners[$day]['protein']) ? $dinners[$day]['protein']->name : 'No protein available' }}<br>
        Carbohydrate: {{ $dinners[$day]['carbohydrate']->name }}<br>
        Vegetable: {{ $dinners[$day]['vegetable']->name }}<br>
        Lipid: {{ $dinners[$day]['lipid']->name }}
      </div>
    </div>
  @endfor
</div>

    </x-app-layout>

