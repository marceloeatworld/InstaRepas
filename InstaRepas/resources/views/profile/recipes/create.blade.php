
    <h1>Create a Recipe</h1>
    <form method="post" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Preparation Steps</label>
            <textarea name="preparation_steps" required></textarea>
        </div>
        <div>
            <label>Preparation Time (minutes)</label>
            <input type="number" name="preparation_time" required>
        </div>
        <div>
            <label>Cooking Time (minutes)</label>
            <input type="number" name="cooking_time" required>
        </div>
        <div>
            <label>Servings</label>
            <input type="number" name="servings" required>
        </div>
        <div>
    <label>Meal Category</label>
    <select name="meal_category_id" required>
        @foreach($recipeCategories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label>Image</label>
    <input type="file" name="image" id="image" required>
</div>
<div>
    <label>Image Preview</label>
    <img id="image_preview" src="#" alt="Image Preview" style="width: 200px; height: auto; display: none;">
</div>

<div id="create-ingredient-form" style="display:none;">
    <h3>Create new ingredient</h3>
    <div class="form-group">
        <label for="new_name">Name</label>
        <input type="text" name="new_name" id="new_name" class="form-control" required>
    </div>
    <div class="form-group">
    <label for="new_category_id">Category</label>
    <select name="new_category_id" id="new_category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="new_restrictions">Dietary Restrictions</label><br>
    @foreach($restrictions as $restriction)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="new_restrictions[]" id="new_restriction_{{ $restriction->id }}" value="{{ $restriction->id }}">
            <label class="form-check-label" for="new_restriction_{{ $restriction->id }}">{{ $restriction->name }}</label>
        </div>
    @endforeach
</div>

<div class="form-group">
    <label for="new_seasons">Seasons</label><br>
    @foreach($seasons as $season)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="new_seasons[]" id="new_season_{{ $season->id }}" value="{{ $season->id }}">
            <label class="form-check-label" for="new_season_{{ $season->id }}">{{ $season->season_name }}</label>
        </div>
    @endforeach
</div>

<div class="form-group">
    <label for="new_meal_combinations">Meal Combinations</label><br>
    @foreach($combinations as $combination)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="new_meal_combinations[]" id="new_meal_combination_{{ $combination->id }}" value="{{ $combination->id }}">
            <label class="form-check-label" for="new_meal_combination_{{ $combination->id }}">{{ $combination->meal_type }}</label>
        </div>
    @endforeach
</div>
<button type="button" id="submit-new-ingredient" class="btn btn-primary">Add Ingredient</button>
</div>

</div>

<h2>Ingredients</h2>
<div id="ingredients">
    <!-- Dynamically add ingredients here -->
</div>
<div>
    <input type="text" id="ingredient-search" placeholder="Search for ingredients">
    <div id="search-results" style="display: none;"></div>
</div>
<div>
    <button type="button" id="add-ingredient">Add Ingredient</button>
</div>
<button type="submit">Create Recipe</button>
</form>
<script>
// Recherche d'ingrédients
const ingredientSearch = document.getElementById('ingredient-search');
const searchResults = document.getElementById('search-results');
const createIngredientForm = document.getElementById('create-ingredient-form');

ingredientSearch.addEventListener('input', async (event) => {
    const query = event.target.value;
    if (query.length < 2) {
        searchResults.style.display = 'none';
        createIngredientForm.style.display = 'none';
        return;
    }

    const response = await fetch('/foods?query=' + query);
    const foods = await response.json();
    searchResults.innerHTML = '';
    foods.forEach(food => {
        const foodElement = document.createElement('div');
        foodElement.textContent = food.name;
        foodElement.style.cursor = 'pointer';
        foodElement.addEventListener('click', () => {
            // Add selected ingredient to the form
            addIngredient(food);
            // Hide search results
            searchResults.style.display = 'none';
            createIngredientForm.style.display = 'none';
        });
        searchResults.appendChild(foodElement);
    });

    searchResults.style.display = foods.length ? 'block' : 'none';
    createIngredientForm.style.display = foods.length ? 'none' : 'block';
});

// Ajouter un ingrédient
function addIngredient(food = null) {
    const ingredientsDiv = document.getElementById('ingredients');
    const newIngredient = document.createElement('div');

    newIngredient.innerHTML = `
        <div>
            <label>Ingredient Name</label>
            <input type="text" name="ingredients[]" value="${food ? food.name : ''}" required>
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantities[]" required>
        </div>
        <div>
            <label>Unit of Measure</label>
            <select name="units_of_measure[]">
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                @endforeach
            </select>
        </div>
    `;
    ingredientsDiv.appendChild(newIngredient);
}

document.getElementById('add-ingredient').addEventListener('click', () => {
    addIngredient();
});

// Soumettre le formulaire de création d'un nouvel ingrédient
document.getElementById('submit-new-ingredient').addEventListener('click', async () => {
    const name = document.getElementById('new_name').value;
    const categoryId = document.getElementById('new_category_id').value;
    const restrictions = Array.from(document.querySelectorAll('input[name="new_restrictions[]"]:checked')).map(input => input.value);
    const seasons = Array.from(document.querySelectorAll('input[name="new_seasons[]"]:checked')).map(input => input.value);
    const mealCombinations = Array.from(document.querySelectorAll('input[name="new_meal_combinations[]"]:checked')).map(input => input.value);

    const response = await fetch('/foods', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({name, categoryId, restrictions, seasons, mealCombinations})
    });

    const newFood = await response.json();
    addIngredient(newFood);

    // Réinitialiser le formulaire
    document.getElementById('new_name').value = '';
    document.getElementById('new_category_id').value = '';
    document.querySelectorAll('input[name="new_restrictions[]"]').forEach(input => input.checked = false);
    document.querySelectorAll('input[name="new_seasons[]"]').forEach(input => input.checked = false);
    document.querySelectorAll('input[name="new_meal_combinations[]"]').forEach(input => input.checked = false);
    createIngredientForm.style.display = 'none';
});




        //prévisualiser l'image
        document.getElementById('image').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image_preview').setAttribute('src', e.target.result);
            document.getElementById('image_preview').style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    });
    </script>
