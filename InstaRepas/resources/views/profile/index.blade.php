@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profil utilisateur</h2>
    <div>
        <a href="{{ route('user.preferences') }}">Modifier les préférences alimentaires</a>
        <a href="{{ route('user.informations') }}">Modifier les infos</a>
    </div>
    <!-- Ajoutez le reste de votre code HTML ici pour le tableau de bord utilisateur -->
    <div>

</div>
@endsection
