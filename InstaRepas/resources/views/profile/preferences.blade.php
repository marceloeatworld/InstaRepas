@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Préférences alimentaires</h2>
    <form action="{{ route('user.updatePreferences') }}" method="post">

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
    <!-- resources/views/profile/preferences.blade.php -->
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
</div>
@endsection
