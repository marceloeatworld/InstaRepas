<!-- /resources/views/food-categories/edit.blade.php -->

<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



    <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center mb-5" style="background-color: #6495ED;">

        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Modifier la catégorie</h5>
        </a>
     
    </div>

    <form action="{{ route('admin.food-categories.update', $food_category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-xl">Nom de la catégorie</label>
            <input type="text" id="name" name="name" value="{{ $food_category->name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light text-xl" required>
        </div>

        <button type="submit" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 text-xl">Modifier la catégorie</button>

    </form>


    </x-app-layout>
