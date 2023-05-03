
<h1 class="mb-5">Ajouter une recette</h1>

<form method="POST" action="{{ route('recipes.store') }}">
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
    <label for="image_url">URL de l'image</label>
    <input type="text" name="image_url" id="image_url" class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}">
    @error('image_url')
      <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="foods">Ingrédients</label>
    <select name="foods[]" id="foods" class="form-control">
      <option value="">Sélectionnez un ingrédient</option>
      @foreach($foods as $food)
        <option value="{{ $food->id }}">{{ $food->name }}</option>
      @endforeach
    </select>
    <button type="button" id="add-food" class="btn btn-primary mt-2">Ajouter</button>
    <ul id="foods-list" class="list-group mt-2"></ul>
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
  var foodsList = [];

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

  function updateFoodsList() {
    var list = document.getElementById('foods-list');
    list.innerHTML = '';
    foodsList.forEach(function(food) {
      var item = document.createElement('li');
      item.classList.add('list-group-item');
      item.textContent = food.name + ' (' + food.quantity + ' ' + food.unit + ')';
      list.appendChild(item);
    });
  }
</script>
