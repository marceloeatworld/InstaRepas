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
            <input type="number" name="days" min="1" value="1">
        </fieldset>

        <button type="submit">Générer des repas</button>
        </form>
    <p>Si vous souhaitez enregistrer vos préférences, veuillez vous <a href="/register">inscrire</a> ou vous <a href="/login">connecter</a>.</p>
</body>
</html>
