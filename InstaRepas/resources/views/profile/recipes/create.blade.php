<h1 class="mb-5">Ajouter une recette</h1>

<form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
    @error('title')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
    @error('description')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="preparation_steps">Étapes de préparation</label>
    <textarea name="preparation_steps" id="preparation_steps" class="form-control @error('preparation_steps') is-invalid @enderror" required>{{ old('preparation_steps') }}</textarea>
    @error('preparation_steps')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="preparation_time">Temps de préparation (en minutes)</label>
    <input type="number" name="preparation_time" id="preparation_time" class="form-control @error('preparation_time') is-invalid @enderror" value="{{ old('preparation_time') }}" required>
    @error('preparation_time')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="cooking_time">Temps de cuisson (en minutes)</label>
    <input type="number" name="cooking_time" id="cooking_time" class="form-control @error('cooking_time') is-invalid @enderror" value="{{ old('cooking_time') }}" required>
    @error('cooking_time')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="servings">Nombre de portions</label>
    <input type="number" name="servings" id="servings" class="form-control @error('servings') is-invalid @enderror" value="{{ old('servings') }}" required>
    @error('servings')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="recipe_category_id">Catégorie</label>
    <select name="recipe_category_id" id="recipe_category_id" class="form-control @error('recipe_category_id') is-invalid @enderror" required>
      <option value="">Sélectionnez une catégorie</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('recipe_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
    @error('recipe_category_id')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
    @error('image')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="foods">Ingrédients</label>
    <input type="text" id="food-search" class="form-control" placeholder="Sélectionnez un ingrédient">
    <div id="food-search-results" class="list-group mt-2" style="display: none;"></div>
    <select name="unit_of_measure" id="unit_of_measure" class="form-control mt-2">
      <option value="">Sélectionnez une unité de mesure</option>
      @foreach($units_of_measure as $unit_of_measure)
          <option value="{{ $unit_of_measure->id }}">{{ $unit_of_measure->unit_name }}</option>
      @endforeach
    </select>
    <button type="button" id="add-food" class="btn btn-primary mt-2">Ajouter</button>
    <ul id="foods-list" class="list-group mt-2"></ul>
  </div>


  </select>
  <button type="button" id="add-food" class="btn btn-primary mt-2">Ajouter</button>
  <button type="button" id="add-new-food" class="btn btn-secondary mt-2">Ajouter un nouvel ingrédient</button>
  <ul id="foods-list" class="list-group mt-2"></ul>
  <div class="mt-3">
    <label for="ingredient-search">Rechercher un ingrédient</label>
    <input type="text" name="ingredient-search" id="ingredient-search" class="form-control">
  </div>
</div>



  <div id="new-food-form-container" class="d-none mt-3">
  <h3>Ajouter un nouvel ingrédient</h3>

  <div class="form-group">
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
  </div>

  <div class="form-group">
    <label for="category_id">Catégorie</label>
    <select name="category_id" id="category_id" class="form-control" required>
      @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="restrictions">Restrictions alimentaires</label><br>
    @foreach($restrictions as $restriction)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="restrictions[]" value="{{ $restriction->id }}">
        <label class="form-check-label" for="restriction_{{ $restriction->id }}">{{ $restriction->name }}</label>
      </div>
    @endforeach
  </div>

  <div class="form-group">
    <label for="seasons">Saisons</label><br>
    @foreach($seasons as $season)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="seasons[]" value="{{ $season->id }}">
        <label class="form-check-label" for="season_{{ $season->id }}">{{ $season->season_name }}</label>
      </div>
    @endforeach
  </div>

  <div class="form-group">
    <label for="meal_combinations">Combinations de repas</label><br>
    @foreach($meal_combinations as $combination)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="meal_combinations[]" value="{{ $combination->id }}">
        <label class="form-check-label" for="meal_combination_{{ $combination->id }}">{{ $combination->meal_type }}</label>
      </div>
    @endforeach
  </div>

  <button type="button" id="submit-new-food" class="btn btn-primary">Ajouter l'ingrédient</button>
</div>





  <div class="form-group">
    <label for="restrictions">Restrictions alimentaires</label>
    @foreach($restrictions as $restriction)
      <div class="form-check">
        <input type="checkbox" name="restrictions[]" id="restriction-{{ $restriction->id }}" value="{{ $restriction->id }}" class="form-check-input @error('restrictions') is-invalid @enderror" {{ in_array($restriction->id, old('restrictions', [])) ? 'checked' : '' }}>
        <label for="restriction-{{ $restriction->id }}" class="form-check-label">{{ $restriction->name }}</label>
      </div>
    @endforeach
    @error('restrictions')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Créer la recette</button>
</form>

<script>
  

  document.getElementById('add-food').addEventListener('click', function() {
  var selectFood = document.getElementById('foods');
  var optionFood = selectFood.options[selectFood.selectedIndex];
  var selectUnit = document.getElementById('units_of_measure');
  var optionUnit = selectUnit.options[selectUnit.selectedIndex];
  var quantity = prompt('Quantité :');

  var food = {
    id: optionFood.value,
    name: optionFood.text,
    quantity: quantity,
    unit: optionUnit.value,
    unit_name: optionUnit.text
  };
  foodsList.push(food);
  updateFoodsList();
});



function updateFoodsList() {
  var list = document.getElementById('foods-list');
  list.innerHTML = '';
  foodsList.forEach(function(food) {
    var item = document.createElement('li');
    item.classList.add('list-group-item');
    item.textContent = food.name + ' (' + food.quantity + ' ' + food.unit_name + ')';
    list.appendChild(item);
  });
}



  // Code pour gérer l'autocomplétion des aliments
  var foodSearch = document.getElementById('food-search');
  var foodSearchResults = document.getElementById('food-search-results');

  foodSearch.addEventListener('input', function() {
    if (foodSearch.value.length > 1) {
      searchFoods(foodSearch.value).then(function(foods) {
        foodSearchResults.innerHTML = '';
        foods.forEach(function(food) {
          var item = document.createElement('div');
          item.classList.add('list-group-item');
          item.textContent = food.name;
          item.addEventListener('click', function() {
            foodSearch.value = food.name;
            foodSearchResults.style.display = 'none';
          });
          foodSearchResults.appendChild(item);
        });
        foodSearchResults.style.display = 'block';
      });
    } else {
      foodSearchResults.style.display = 'none';
    }
  });

  document.body.addEventListener('click', function(event) {
    if (event.target !== foodSearch && event.target !== foodSearchResults) {
      foodSearchResults.style.display = 'none';
    }
  });

  document.getElementById('add-food').addEventListener('click', function() {
    var select = document.getElementById('foods');
    var option = select.options[select.selectedIndex];
    var quantity = prompt('Quantité :');
    var unit = prompt('Unité de mesure :');
    var food = {
      id: option.value,
      name: option.text,
      quantity: quantity,
      unit: unit
    };
    foodsList.push(food);
    updateFoodsList();
  });

  document.getElementById('add-new-food').addEventListener('click', function() {
  var formContainer = document.getElementById('new-food-form-container');
  formContainer.classList.toggle('d-none');
});

document.getElementById('ingredient-search').addEventListener('input', function() {
  if (this.value.length >= 2) {
    searchIngredient(this.value);
  }
});
document.getElementById('food-search').addEventListener('input', function() {
    if (this.value.length >= 2) {
      searchIngredient(this.value);
    }
  });
function searchIngredient(query) {
    var apiUrl = '/api/foods?search=' + encodeURIComponent(query);

    fetch(apiUrl)
      .then(function(response) {
        return response.json();
      })
      .then(function(ingredients) {
        var resultsContainer = document.getElementById('food-search-results');
        resultsContainer.innerHTML = '';
        ingredients.forEach(function(ingredient) {
          var item = document.createElement('div');
          item.classList.add('list-group-item');
          item.textContent = ingredient.name;
          item.addEventListener('click', function() {
            document.getElementById('food-search').value = ingredient.name;
            var food = {
              id: ingredient.id,
              name: ingredient.name
            };
            foodsList.push(food);
            updateFoodsList();
            resultsContainer.style.display = 'none';
          });
          resultsContainer.appendChild(item);
        });
        resultsContainer.style.display = ingredients.length > 0 ? 'block' : 'none';
      });
  }


</script>
