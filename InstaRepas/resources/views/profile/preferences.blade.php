@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Préférences alimentaires</h2>
    <form action="{{ route('user.preferences') }}" method="post">
        @csrf
        <fieldset>
            <legend>Restrictions alimentaires</legend>
            @foreach($dietaryRestrictions as $restriction)
                <label>
                    <input type="checkbox" name="restrictions[]" value="{{ $restriction->id }}" {{ Auth::user()->preferences->contains($restriction) ? 'checked' : '' }}> {{ $restriction->name }}
                </label>
            @endforeach
        </fieldset>

        <fieldset>
            <legend>Produits en fonction des saisons</legend>
            <label>
                <input type="checkbox" name="seasonal" value="1" {{ Auth::user()->seasonal ? 'checked' : '' }}> Utiliser seulement les produits de saison
            </label>
        </fieldset>

        <fieldset>
            <legend>Snacks</legend>
            <label>
                <input type="checkbox" name="include_snacks" value="1" {{ Auth::user()->include_snacks ? 'checked' : '' }}> Inclure des snacks
            </label>
        </fieldset>

        <fieldset>
            <legend>Nombre de jours</legend>
            <input type="number" name="days" min="1" value="{{ Auth::user()->days }}">
        </fieldset>

        <button type="submit">Enregistrer les préférences</button>
    </form>
</div>
@endsection
