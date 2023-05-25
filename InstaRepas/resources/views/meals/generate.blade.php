<x-app-layout>
    <div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2 p-6 rounded-lg flex items-center justify-center text-center bg-gradient-to-r from-blue-900 to-blue-400">
                <h5 class="mb-2 text-2xl font-semibold tracking-normal text-white mx-4">Savourez l'expérience</h5>

            </div>
        </div>

            <form action="{{ route('generate_meals') }}" method="post" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-6 py-4 mx-auto w-full md:w-2/3 lg:w-1/2">
                @csrf
                <fieldset>
                    <legend class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2 text-center">Restrictions alimentaires</legend>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        @foreach ($availableDietaryRestrictions as $restriction)
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="restrictions[]" value="{{ $restriction->name }}" {{ in_array($restriction->id, $userPreferences) ? 'checked' : '' }}><span class="ml-2 text-gray-700 dark:text-gray-200">{{ $displayNames[$restriction->name] }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2 text-center">Nombre de jours</legend>
                    <div class="mb-4 w-1/4 mx-auto">
                        <input type="number" name="days" min="1" value="1" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                    </div>
                </fieldset>

                <div class="flex items-center justify-center">
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700">Génerer</button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                Si vous souhaitez enregistrer vos préférences, veuillez vous <a href="/register" class="text-blue-600 hover:text-blue-500 underline">inscrire</a> ou vous <a href="/login" class="text-blue-600 hover:text-blue-500 underline">connecter</a>.
            </div>
        </div>
    </div>
</x-app-layout>
