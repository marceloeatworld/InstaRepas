
    <h1>Recipes</h1>
    <ul>
        @foreach($recipes as $recipe)
            <li>
                <h3>{{ $recipe->title }}</h3>
                <p>{{ $recipe->description }}</p>
            </li>
        @endforeach
    </ul>
