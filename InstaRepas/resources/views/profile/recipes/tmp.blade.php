<!-- Image -->
<div class="form-group">
  <label for="image">Image</label>
  <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*" required>
  @error('image')
    <span class="invalid-feedback">{{ $message }}</span>
  @enderror
</div>


function previewImage(inputId, previewId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
  
    if (input.files && input.files[0]) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
  
      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  }



  <div class="form-group">
    <label for="foods">Ingrédients</label>
    <input type="text" id="food-search" class="form-control" placeholder="Sélectionnez un ingrédient">
    <div id="food-search-results" class="list-group mt-2" style="display: none;"></div>
    <input type="number" id="food-quantity" class="form-control mt-2" placeholder="Quantité" min="1">
    <select name="unit_of_measure" id="unit_of_measure" class="form-control mt-2">
        <option value="">Sélectionnez une unité de mesure</option>
        @foreach($units_of_measure as $unit_of_measure)
            <option value="{{ $unit_of_measure->id }}">{{ $unit_of_measure->unit_name }}</option>
        @endforeach
    </select>
    <button type="button" id="add-food" class="btn btn-primary mt-2">Ajouter</button>
    <ul id="foods-list" class="list-group mt-2"></ul>
</div>


  
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