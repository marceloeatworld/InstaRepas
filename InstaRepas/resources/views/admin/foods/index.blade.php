<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="{{ route('admin.foods.index') }}">Food</a></li>
            <li><a href="{{ route('admin.foods.create') }}">Ajouter Food</a></li>
        </ul>
    </nav>

    <h1>Food List</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $food)
            <tr>
                <td>{{ $food->id }}</td>
                <td>{{ $food->name }}</td>
                <td>
                    <a href="{{ route('admin.foods.edit', $food->id) }}">Edit</a>
                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this food?')){ document.getElementById('delete-form-{{ $food->id }}').submit(); }">Delete</a>
                    <form id="delete-form-{{ $food->id }}" action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>