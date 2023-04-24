
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préférences alimentaires</title>
</head>
<body>
    <h1>Préférences alimentaires</h1>
    <form action="{{ route('generate_meals') }}" method="post">
        @csrf
        <h2>Restrictions alimentaires</h2>
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

        <h2>Produits en fonction des saisons</h2>
        <label>
            <input type="checkbox" name="seasonal" value="1"> Utiliser seulement les produits de saison
        </label>

        <h2>Snacks</h2>
        <label>
            <input type="checkbox" name="include_snacks" value="1"> Inclure des snacks
        </label>

        <h2>Nombre de jours</h2>
        <input type="number" name="days" min="1" value="1">

        <button type="submit">Générer des repas</button>
    </form>
</body>
</html>
