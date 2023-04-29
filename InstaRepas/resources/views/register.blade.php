@extends('layouts.app')

@section('content')
    <!--  Request me for a signup form or any type of help  -->
    <div class="login-form">
    <form action="{{ url('/create_account') }}" method="POST">
        {{ csrf_field() }}
        <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
        <h4 class="modal-title">S'enregistrer</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('status'))
        <div class="alert alert-success">
         {{Session::get('status')}}
        </div>
        @endif

        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="first_name" placeholder="Prénom">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Nom">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Mail" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe"
                required="required">
        </div>

        <input type="submit" class="btn btn-primary btn-block btn-lg" value="S'enregistrer">
    </form>
    <div class="text-center small">Vous avez déjà un compte?<a href="#"> Se connecter</a></div>
</div>

@endsection
