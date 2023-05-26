<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg text-center border-b-2 border-blue-600 shadow-md transition-all duration-500 hover:shadow-lg">
                <h5 class="mb-2 text-3xl font-bold tracking-tighter text-blue-600 transform transition-transform duration-500 hover:scale-105">Savourez l'expérience</h5>
            </div>
        </div>

        <form action="{{ route('generate_meals') }}" method="post" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4 mx-auto max-w-7xl transition-all duration-500 hover:shadow-md">
            @csrf
            <fieldset>
                <legend class="text-xl font-semibold text-blue-600 mb-2 text-center transition-colors duration-500 hover:text-blue-700">Restrictions alimentaires</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    @foreach ($availableDietaryRestrictions as $restriction)
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="restrictions[]" value="{{ $restriction->name }}" {{ in_array($restriction->id, $userPreferences) ? 'checked' : '' }}><span class="ml-2 text-gray-700 dark:text-gray-200 transition-colors duration-500 hover:text-blue-700">{{ $displayNames[$restriction->name] }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset>
                <legend class="text-xl font-semibold text-blue-600 mb-2 text-center transition-colors duration-500 hover:text-blue-700">Nombre de jours</legend>
                <div class="mb-4 w-full md:w-1/2 lg:w-1/4 mx-auto">
                    <input type="number" name="days" min="1" value="1" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md transition-all duration-300 hover:border-blue-600">
                </div>
            </fieldset>

            <div class="flex items-center justify-center mt-6">
            <button id="buttonY" type="submit" class="">Génerer</button>

            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Si vous souhaitez enregistrer vos préférences, veuillez vous <a href="/register" class="text-blue-600 hover:text-blue-500 underline transition-colors duration-300 hover:text-blue-700">inscrire</a> ou vous <a href="/login" class="text-blue-600 hover:text-blue-500 underline transition-colors duration-300 hover:text-blue-700">connecter</a>.
        </div>
    </div>
</x-app-layout>
