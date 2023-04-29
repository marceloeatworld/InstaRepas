
@extends('layouts.app')

@section('content')
<div class="container">
<h3>Informations personnelles</h3>
        <ul>
            <li>Nom d'utilisateur : {{ Auth::user()->username }}</li>
            <li>Prénom : {{ Auth::user()->first_name }}</li>
            <li>Nom : {{ Auth::user()->last_name }}</li>
            <li>Email : {{ Auth::user()->email }}</li>
            <li>Date d'inscription : {{ Auth::user()->registration_date }}</li>
          
        </ul>

        </div>
@endsection
