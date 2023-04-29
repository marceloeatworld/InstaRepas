@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profil utilisateur</h2>
    <div>
        <a href="{{ route('user.preferences') }}">Modifier les préférences alimentaires</a>
    </div>
    <!-- Ajoutez le reste de votre code HTML ici pour le tableau de bord utilisateur -->
</div>
@endsection
