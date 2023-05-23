<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center" style="background-color: #6495ED;">

                <a href="{{ route('admin.users.index') }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Préférences alimenaites</h5>
                </a>

            </div>

            <form action="{{ route('generate_meals') }}" method="post">
                @csrf
                <fieldset>
        <legend>Restrictions alimentaires</legend>
        <div>
            @foreach ($availableDietaryRestrictions as $restriction)
                <label class="block mb-2">
                    <input type="checkbox" name="restrictions[]" value="{{ $restriction->name }}" {{ in_array($restriction->id, $userPreferences) ? 'checked' : '' }}> {{ $displayNames[$restriction->name] }}
                </label>
            @endforeach
        </div>

        </fieldset>



                <fieldset>
                    <legend>Nombre de jours</legend>
                    <input type="number" name="days" min="1" value="1">
                </fieldset>

                <div style="text-align: center;">
                    <button type="submit" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Génerer</button>
                </div>
            </form>
            <p style="text-align: center;">Si vous souhaitez enregistrer vos préférences, veuillez vous <a href="/register">inscrire</a> ou vous <a href="/login">connecter</a>.</p>
        </div>
    </div>

    </x-app-layout>
