<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $food->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $food->category_id ?? '') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="restrictions">Dietary Restrictions</label><br>
    @foreach($restrictions as $restriction)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="restrictions[]" value="{{ $restriction->id }}" {{ (isset($food) && $food->restrictions->contains($restriction->id)) ? 'checked' : '' }}>
            <label class="form-check-label" for="restriction_{{ $restriction->id }}">{{ $restriction->name }}</label>
        </div>
    @endforeach
</div>

<div class="form-group">
    <label for="seasons">Seasons</label><br>
    @foreach($seasons as $season)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ (isset($food) && $food->seasons->contains($season->id)) ? 'checked' : '' }}>
            <label class="form-check-label" for="season_{{ $season->id }}">{{ $season->season_name }}</label>
        </div>
    @endforeach
</div>

<div class="form-group">
    <label for="meal_combinations">Meal Combinations</label><br>
    @foreach($meal_combinations as $combination)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="meal_combinations[]" value="{{ $combination->id }}" {{ in_array($combination->id, old('meal_combinations', isset($combination_foods) ? $combination_foods->pluck('combination.id')->toArray() : [])) ? 'checked' : '' }}>
            <label class="form-check-label" for="meal_combination_{{ $combination->id }}">{{ $combination->meal_type }}</label>
        </div>
    @endforeach
</div>

<div class="form-group">
    <label for="nutritional_type">Nutritional Type</label>
    <select name="nutritional_type" id="nutritional_type" class="form-control" required>
        @foreach($nutritional_types as $type)
            <option value="{{ $type }}" {{ (old('nutritional_type', $food->nutritional_type ?? '') == $type) ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="is_valid">Validated</label>
    <input type="hidden" name="is_valid" value="0">
    <input type="checkbox" name="is_valid" id="is_valid" class="form-check-input" value="1" {{ (isset($food) && $food->is_valid) ? 'checked' : '' }}>
</div>
