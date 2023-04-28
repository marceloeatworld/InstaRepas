<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('generate') }}">Génerer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('recipes') }}">Recettes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}">Login</a>
              </li>
          </ul>
        </div>
      </nav>
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

</body>

</html>
