<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <nav>
        <ul>
            <li><a href="{{ route('admin.foods.index') }}">Food</a></li>
            <li><a href="{{ route('admin.foods.create') }}">Ajouter Food</a></li>
        </ul>
    </nav>

    <h1>Food List</h1>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.foods.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <label for="search" class="input-group-text">Search:</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ $search ?? '' }}">
                    <input type="hidden" name="category" value="{{ $selectedCategory ?? '' }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.foods.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <label for="category" class="input-group-text">Category:</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">All</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($selectedCategory == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="search" value="{{ $search ?? '' }}">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($foods as $food)
        <tr>
            <td>{{ $food->id }}</td>
            <td>{{ $food->name }}</td>
            <td>{{ $food->category->name }}</td>
            <td>
                        <a href="{{ route('admin.foods.edit', $food->id) }}">Edit</a>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this food?')){ document.getElementById('delete-form-{{ $food->id }}').submit(); }">Delete</a>
                        <form id="delete-form-{{ $food->id }}" action="{{ route('admin.foods.destroy', $food->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" style="display: none;">
                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>

    </div>
</x-app-layout>
