<x-app-layout>


    <div class="py-12 transition-all duration-500 ease-in-out">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            @if(Session::has('success'))
            <x-yellow-button >
                {{ Session::get('success') }}
            </x-yellow-button>
        @endif
            <form action="{{ route('profile.updatePreferences') }}" method="post" class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transition-all duration-500 hover:shadow-lg">

                @csrf
                <fieldset>
                    <div class="w-full p-6 border border-blue-600 rounded-lg text-center shadow-md transition-all duration-500 hover:shadow-lg bg-gradient-to-r from-blue-500 to-purple-600">

                        <a href="{{ route('admin.users.index') }}">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tighter text-white mx-4 transform transition-transform duration-500 hover:scale-105">Restrictions alimentaires</h5>
                        </a>

                    </div>
                    @foreach($dietaryRestrictions as $restriction)
                    <label class="block mb-2 text-lg font-medium text-blue-900 dark:text-white transition-colors duration-200 hover:text-blue-600 items-center justify-center text-center">
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
