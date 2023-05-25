<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-blue-600 dark:text-gray-200 leading-tight transform hover:scale-105 transition duration-300">
            {{ __('Preference Alimentaire') }}
        </h2>
    </x-slot>

    <div class="py-12 transition-all duration-500 ease-in-out">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('profile.updatePreferences') }}" method="post" class="bg-white dark:bg-gray-800 rounded shadow p-6">

                @csrf
                <fieldset>
                    <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center bg-gradient-to-r from-blue-500 to-purple-600 transform hover:scale-105 transition duration-300">

                        <a href="{{ route('admin.users.index') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Restrictions alimentaires</h5>
                        </a>

                    </div>
                    @foreach($dietaryRestrictions as $restriction)
                    <label class="block mb-2 text-lg font-medium text-gray-700 dark:text-white transition-colors duration-200 hover:text-blue-600 items-center justify-center text-center">
                        <input type="checkbox" name="restrictions[]" value="{{ $restriction->id }}" {{ Auth::user()->preferences->contains($restriction) ? 'checked' : '' }}> {{ $displayNames[$restriction->name] }}
                    </label>
                    @endforeach
                </fieldset>

                <div class="flex justify-center">
                    <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-purple-500 hover:to-orange-500 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-teal-700 font-medium rounded-lg text-white text-sm px-5 py-2.5 text-center transform hover:scale-105 transition duration-300">Enregistrer les préférences</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
