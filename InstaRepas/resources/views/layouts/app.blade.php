<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>InstaRepas</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">InstaRepas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('generate') }}">Générer</a>
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

@yield('content')

<footer class="bg-light text-center text-lg-start">
  <div class="container p-4">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">À propos de nous</h5>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
          aliquam voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Liens</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">Lien 1</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Lien 2</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Lien 3</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Lien 4</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Liens</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!" class="text-dark">Lien 1</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Lien 2</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Lien 3</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Lien 4</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Toyan
  </div>
</footer>

</body>
</html>