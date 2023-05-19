<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


    <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center" style="background-color: #082f49;">
        <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('images/image.png') }}" alt="Image1">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Les aliments</h5>
        </a>
        <img class="w-16 h-16 rounded-full object-cover" src="{{ asset('images/image.png') }}" alt="Image2">
    </div>

    @if(Session::has('success'))
        <x-yellow-button >
                    {{ Session::get('success') }}
                </x-yellow-button>
            @endif

    <div class="py-12">
    <div class="col-md-4">

        <form action="{{ route('admin.foods.index') }}" method="GET" class="mb-3">
            <div class="flex">
                <div class="relative w-full">
                    <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search foods..." value="{{ $search ?? '' }}">
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="sr-only">Recherche</span>
                    </button>
                </div>
            </form>

            </div>

            <div class="col-md-4">
                <form action="{{ route('admin.foods.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <label for="category" class="input-group-text">Categories:</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Tout</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id', $food->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                                                                                     {{ __('messages.categories.' . $category->name) }}
    </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="search" value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </div>
                </form>
            </div>

            <input type="hidden" name="category" value="{{ $selectedCategory ?? '' }}">

            <a href="{{ route('admin.foods.index', ['not_validated' => 1]) }}" class="inline-block px-6 py-2 text-xs font-medium text-white transition-colors duration-150 bg-red-600 rounded-lg focus:shadow-outline hover:bg-red-700">Afficher les aliments non validés</a>


    </div>
    <div class="py-12">


<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Nom</th>
            <th scope="col" class="px-6 py-3">Categorie</th>
            <th scope="col" class="px-6 py-3">Ajouté par</th>
            <th scope="col" class="px-6 py-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $food)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $food->id }}</td>
                <td @if(!$food->is_valid) style="color: red;" @endif class="px-6 py-4">{{ $food->name }}</td>
                <td class="px-6 py-4">{{ $food->category->name }}</td>
                <td class="px-6 py-4">{{ $food->user ? $food->user->username : 'N/A' }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.foods.edit', $food->id) }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a>

                    <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" onclick="if (confirm('Voulez-vous vraiment supprimer cet aliment ?')) this.form.submit();" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Supprimer</button>
</form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>



        </div>

    </div>

</x-app-layout>
