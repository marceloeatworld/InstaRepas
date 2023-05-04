
  <h1>Recettes</h1>
  <ul>

    @foreach ($recipes as $recipe)
      <li><a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->title }}</a></li>
    @endforeach
  </ul>
