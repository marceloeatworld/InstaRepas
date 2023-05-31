<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center mb-6" style="background-color: #6495ED;">
            <a href="{{ route('admin.foods.index') }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Les aliments</h5>
            </a>
        </div>

        @if(Session::has('success'))
            <x-yellow-button>
                {{ Session::get('success') }}
            </x-yellow-button>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <!-- Colonne de recherche -->
            <div class="col-span-1">
            <form action="{{ route('admin.foods.index') }}" method="GET" class="mb-2">
            <div class="relative w-full">
                <input 
                    type="search" 
                    name="search" 
                    id="search" 
                    placeholder="Recherche d'aliments..."
                    value="{{ $search ?? '' }}"
                    class="w-full p-2 text-sm bg-gray-50 border border-gray-300 rounded-r-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                />
                <button 
                    type="submit" 
                    class="absolute top-0 right-0 p-2 text-white bg-blue-700 border border-blue-700 rounded-r-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700"
                >
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span class="sr-only">Recherche</span>
                </button>
            </div>

            </form>
            </div>

            <!-- Colonne de sélection de catégorie -->
            <div class="col-span-1">
                <form action="{{ route('admin.foods.index') }}" method="GET" class="mb-2">
                    <div class="input-group">
                        <label for="category" class="input-group-text">Categories:</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Tout</option>
                            <!-- Boucle à travers toutes les catégories passées à la vue -->
                            @foreach($categories as $category)
                                <!-- Crée une option dans le select pour chaque catégorie, la valeur de l'option est l'ID de la catégorie -->
                                <!-- Si l'ID de la catégorie est la même que celle présente dans la requête (i.e., la catégorie sélectionnée), l'option est marquée comme sélectionnée {{ (request()->input('category') == $category->id) ? 'selected' : '' }}> -->
                                <option value="{{ $category->id }}" {{ (request()->input('category') == $category->id) ? 'selected' : '' }}>
                                
                                    <!-- Vérifie si une traduction existe pour le nom de la catégorie dans le fichier de langues -->
                                    @if(\Lang::has('messages.categories.' . $category->name))
                                        <!-- Si une traduction existe, utilise cette traduction -->
                                        {{ __('messages.categories.' . $category->name) }}
                                    @else
                                        <!-- Si aucune traduction n'existe, utilise simplement le nom de la catégorie -->
                                        {{ $category->name }}
                                    @endif
                                </option>
                            @endforeach



                        </select>
                        <input type="hidden" name="search" value="{{ $search ?? '' }}">
                    </div>
                </form>
            </div>

            <!-- Colonne de filtre pour aliments non validés -->
            <div class="col-span-1 md:col-span-2 text-left md:text-right">
                <a href="{{ route('admin.foods.index', ['not_validated' => 1]) }}" class="inline-block px-6 py-2 text-xs font-medium text-white transition-colors duration-150 bg-red-600 rounded-lg focus:shadow-outline hover:bg-red-700">Afficher les aliments non validés</a>
            </div>
        </div>

    <div class="py-12">


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-scroll md:overflow-x-auto">
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
                    @if($food->id > 280)
                    <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="if (confirm('Voulez-vous vraiment supprimer cet aliment ?')) this.form.submit();" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Supprimer</button>
                </form>
                @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



        </div>

    </div>
    <script>
    // Assure que tout le contenu HTML est chargé avant d'exécuter le script
    $(document).ready(function() {
        // Attache un gestionnaire d'événement 'change' à l'élément HTML avec l'id 'category'
        $('#category').change(function() {
            // Lorsque l'élément change, trouve le formulaire le plus proche et le soumet
            $(this).closest('form').submit();
        });
    });




</script>
</x-app-layout>
