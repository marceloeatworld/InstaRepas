<!-- /resources/views/food-categories/create.blade.php -->

<x-app-layout>
    <h1>Create a new Category</h1>

    <form action="{{ route('admin.food-categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>

    </x-app-layout>