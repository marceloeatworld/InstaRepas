<a href="{{ url('/') }}">Accueil</a>
<a href="{{ url('generate') }}">Générer</a>
<a href="{{ url('recipes') }}">Recettes</a>
<a href="{{ url('login') }}">Login</a>


@extends('layouts.app')

@section('content')
  <h1>Recettes</h1>
  <ul>
  <a href="{{ url('recipes/create') }}">Créer une recette</a>

    @foreach ($recipes as $recipe)
      <li><a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->title }}</a></li>
    @endforeach
  </ul>
@endsection