<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        form {
            display: inline-block;
        }
    </style>
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
    <form action="{{ route('admin.foods.index') }}" method="GET">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" value="{{ $search ?? '' }}">
        <button type="submit">Search</button>
    </form>
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

</body>

</html>