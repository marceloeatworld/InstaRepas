<!-- /resources/views/food-categories/edit.blade.php -->

<x-app-layout>
    <h1>Edit Category: {{ $category->name }}</h1>

    <form action="{{ route('admin.food-categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
    </x-app-layout>