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
    <label for="restrictions">Dietary Restrictions</label>
    <select name="restrictions[]" id="restrictions" class="form-control" multiple>
        @foreach($restrictions as $restriction)
            <option value="{{ $restriction->id }}" {{ (isset($food) && $food->restrictions->contains($restriction->id)) ? 'selected' : '' }}>{{ $restriction->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="seasons">Seasons</label>
    <select name="seasons[]" id="seasons" class="form-control" multiple>
        @foreach($seasons as $season)
            <option value="{{ $season->id }}" {{ (isset($food) && $food->seasons->contains($season->id)) ? 'selected' : '' }}>{{ $season->season_name }}</option>
        @endforeach
    </select>
</div>