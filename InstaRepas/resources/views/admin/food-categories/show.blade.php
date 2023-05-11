<!-- /resources/views/admin/food-categories/show.blade.php -->
<x-app-layout>
    <h1>Category: {{ $category->name }}</h1>

    <h2>Foods in this Category:</h2>

    @if($category->foods->isEmpty())
        <p>No foods found in this category.</p>
    @else
        <ul>
            @foreach($category->foods as $food)
                <li>{{ $food->name }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('admin.food-categories.edit', $category) }}" class="btn btn-secondary">Edit Category</a>
    <form action="{{ route('admin.food-categories.destroy', $category) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Category</button>
    </form>
</x-app-layout>