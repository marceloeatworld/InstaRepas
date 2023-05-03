
  <h1>Recettes</h1>
  <ul>
  <a href="{{ url('recipes/create') }}">Créer une recette</a>

    @foreach ($recipes as $recipe)
      <li><a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->title }}</a></li>
    @endforeach
  </ul>
