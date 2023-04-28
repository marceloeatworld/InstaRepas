<<<<<<< HEAD
<<<<<<< HEAD
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

<h1>Ceci est la page générer</h1>
=======
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préférences alimentaires</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 60px;
        }
        button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Préférences alimentaires</h1>
    <form action="{{ route('generate_meals') }}" method="post">
        @csrf
        <fieldset>
            <legend>Restrictions alimentaires</legend>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_gluten"> Sans gluten
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_fish"> Sans poisson
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_meat"> Sans viande
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_lactose"> Sans lactose
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_animal_products"> Sans produit animal
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_pork"> Sans porc
            </label>
        </fieldset>
>>>>>>> origin/tolga

        <fieldset>
            <legend>Produits en fonction des saisons</legend>
            <label>
                <input type="checkbox" name="seasonal" value="1"> Utiliser seulement les produits de saison
            </label>
        </fieldset>

        <fieldset>
            <legend>Snacks</legend>
            <label>
                <input type="checkbox" name="include_snacks" value="1"> Inclure des snacks
            </label>
        </fieldset>

        <fieldset>
    <legend>Nombre de jours</legend>
    <input type="number" name="days" min="1" max="60" value="1">
</fieldset>


<<<<<<< HEAD
=======
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préférences alimentaires</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 60px;
        }
        button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Préférences alimentaires</h1>
    <form action="{{ route('generate_meals') }}" method="post">
        @csrf
        <fieldset>
            <legend>Restrictions alimentaires</legend>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_gluten"> Sans gluten
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_fish"> Sans poisson
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_meat"> Sans viande
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_lactose"> Sans lactose
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_animal_products"> Sans produit animal
            </label>
            <label>
                <input type="checkbox" name="restrictions[]" value="contains_pork"> Sans porc
            </label>
        </fieldset>

        <fieldset>
            <legend>Produits en fonction des saisons</legend>
            <label>
                <input type="checkbox" name="seasonal" value="1"> Utiliser seulement les produits de saison
            </label>
        </fieldset>

        <fieldset>
            <legend>Snacks</legend>
            <label>
                <input type="checkbox" name="include_snacks" value="1"> Inclure des snacks
            </label>
        </fieldset>

        <fieldset>
    <legend>Nombre de jours</legend>
    <input type="number" name="days" min="1" max="60" value="1">
</fieldset>


=======
>>>>>>> origin/tolga
        <button type="submit">Générer des repas</button>
    </form>
</body>
</html>
<<<<<<< HEAD
>>>>>>> 597fc93643cef5bb016b667e61ede7ddcc1b52d5
=======
>>>>>>> origin/tolga
