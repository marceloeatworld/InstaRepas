# Importer une base de données existante dans Laravel 10

### ORM signifie "Object-Relational Mapping" en anglais. L'ORM est une technique qui permet de mapper des objets en langage de programmation à des tables de base de données relationnelles, facilitant ainsi l'interaction entre l'application et la base de données.


1. Ouvrez votre application Laravel et connectez-vous à votre base de données. 

Vous pouvez utiliser un outil tel que phpMyAdmin, MySQL Workbench, ou un autre client MySQL.

2. Importez le fichier BASE.sql dans votre base de données. 
Si vous utilisez phpMyAdmin, vous pouvez le faire en sélectionnant votre base de données, puis en cliquant sur l'onglet "Importer" et en choisissant le fichier BASE.sql.

3. Créer les modèles Eloquent

```php
php artisan make:model FoodCategory -m
php artisan make:model Season -m
php artisan make:model User -m
php artisan make:model DietaryRestriction -m
php artisan make:model Food -m
php artisan make:model UserPreference -m
php artisan make:model FoodsRestriction -m
php artisan make:model MealCombination -m
php artisan make:model CombinationsFood -m
php artisan make:model RecipeCategory -m
php artisan make:model Recipe -m
php artisan make:model RecipesRestriction -m
php artisan make:model RecipesFood -m
php artisan make:model FoodsSeason -m
```

4. Configurez les relations et les propriétés de chaque modèle Eloquent dans app/Models/. Utilisez les clés étrangères et les indices de la structure de la base de données pour déterminer les relations entre les modèles.
Exemple pour app/Models/FoodCategory.php:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function foods()
    {
        return $this->hasMany(Food::class, 'category_id');
    }
}
```

5. cree les migrations avec la commande suivante :

```php
php artisan migrate
```