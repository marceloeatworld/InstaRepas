
    <x-app-layout>


<div style="display: flex; justify-content: center;">
    <div style="max-width: 600px;">
        <h1 style="text-align: center;">Préférences alimentaires</h1>
        <form action="{{ route('generate_meals') }}" method="post">
            @csrf
            <fieldset>
    <legend>Restrictions alimentaires</legend>
    @foreach ($availableDietaryRestrictions as $restriction)
        <label>
            <input type="checkbox" name="restrictions[]" value="{{ $restriction->name }}" {{ in_array($restriction->id, $userPreferences) ? 'checked' : '' }}> {{ $displayNames[$restriction->name] }}
        </label>
    @endforeach
    </fieldset>




            <fieldset>
                <legend>Produits en fonction des saisons</legend>
                <label>
                    <input type="checkbox" name="seasonal" value="1"> Utiliser seulement les produits de saison
                </label>
            </fieldset>

            <fieldset>
                <legend>Snacks</legend>
                <label>
                    <input type="checkbox" name="include_snacks" value="1"> Inclure des snacks
                </label>
            </fieldset>

            <fieldset>
                <legend>Nombre de jours</legend>
                <input type="number" name="days" min="1" value="1">
            </fieldset>

            <div style="text-align: center;">
                <button type="submit">Générer des repas</button>
            </div>
        </form>
        <p style="text-align: center;">Si vous souhaitez enregistrer vos préférences, veuillez vous <a href="/register">inscrire</a> ou vous <a href="/login">connecter</a>.</p>
    </div>
</div>

</x-app-layout>

