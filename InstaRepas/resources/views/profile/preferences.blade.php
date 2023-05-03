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
<legend>Restrictions alimentaires</legend>
@foreach($dietaryRestrictions as $restriction)
<label>
    <input type="checkbox" name="restrictions[]" value="{{ $restriction->id }}" {{ Auth::user()->preferences->contains($restriction) ? 'checked' : '' }}> {{ $displayNames[$restriction->name] }}
</label>
@endforeach
</fieldset>




<button type="submit">Enregistrer les préférences</button>
</form>


        </div>
    </div>
</x-app-layout>
