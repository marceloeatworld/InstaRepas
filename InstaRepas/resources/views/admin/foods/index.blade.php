@extends('layouts.app')

@section('content')
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
@endsection
