<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('logout') }}">Se déconnecter</a>
                </li>
            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('login') }}">Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>



        {{-- @auth
        <p>Bonjour, {{ Auth::user()->name }} !</p>
        <p>Email : {{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}">Se déconnecter</a>
    @else
        <p>Vous n'êtes pas connecté.</p>
    @endauth --}}


    <h1>Ceci est la page d'accueil</h1>

</body>
</html>
