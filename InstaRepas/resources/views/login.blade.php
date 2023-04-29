@extends('layouts.app')

@section('content')

<!--  Request me for a signup form or any type of help  -->
<div class="login-form">
    <form action="{{ url('/access_account') }}" method="POST">
        {{ csrf_field() }}
		<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
    	<h4 class="modal-title">Se connecter</h4>

        @if (Session::has('status'))
        <div class="alert alert-danger">
            {{ Session::get('status') }}
        </div>
        @endif

        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Mail" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required">
        </div>

        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Se connecter">

        <a href="{{ url('/auth/google') }}">Se connecter avec Google</a>

    </form>
    <div class="text-center small">Vous n'avez pas de compte?<a href="#"> S'enregistrer</a></div>
</div>

@endsection




