
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
            <li><a href="{{ route('admin.food-categories.index') }}">Categories</a></li>
            <li><a href="{{ route('admin.foods.index') }}">Food</a></li>
            <li><a href="{{ route('admin.foods.create') }}">Ajouter Food</a></li>
            <li><a href="{{ route('admin.users.index') }}">Users</a></li>

        </ul>
    </nav>
        </div>

    </div>
</x-app-layout>
