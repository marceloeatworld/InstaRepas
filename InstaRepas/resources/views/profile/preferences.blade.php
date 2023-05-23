<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Preference Alimentaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <form action="{{ route('profile.updatePreferences') }}" method="post">

@csrf
<fieldset>
    <div class="w-full p-6 border border-gray-200 rounded-lg shadow flex items-center justify-center text-center" style="background-color: #6495ED;">

        <a href="{{ route('admin.users.index') }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white mx-4 tracking-wider">Restrictions alimentaires</h5>
        </a>

    </div>
@foreach($dietaryRestrictions as $restriction)
<label class="block mb-2">
    <input type="checkbox" name="restrictions[]" value="{{ $restriction->id }}" {{ Auth::user()->preferences->contains($restriction) ? 'checked' : '' }}> {{ $displayNames[$restriction->name] }}
</label>
@endforeach
</fieldset>




                    <button type="submit" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Enregistrer les préférences</button>

</form>


        </div>
    </div>
</x-app-layout>
