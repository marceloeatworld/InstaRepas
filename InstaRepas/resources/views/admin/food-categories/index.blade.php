<!-- /resources/views/food-categories/index.blade.php -->
<x-app-layout>
    <h1>All Categories</h1>

    <a href="{{ route('admin.food-categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.food-categories.edit', $category) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('admin.food-categories.destroy', $category) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </x-app-layout>