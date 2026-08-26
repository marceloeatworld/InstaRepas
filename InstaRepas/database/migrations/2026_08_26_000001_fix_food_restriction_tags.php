<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Data fix: complete the restriction tagging so category contents match
     * the dietary restrictions (pork is meat, animal products cover meat,
     * fish, dairy, eggs and crustaceans, crustaceans are tagged as such).
     * Idempotent: only inserts missing links.
     */
    private const CATEGORY_RESTRICTIONS = [
        'contains_meat' => ['Meat'],
        'contains_animal_products' => ['Meat', 'Fish', 'Dairy', 'Eggs', 'Crustacean'],
        'contains_fish' => ['Fish', 'Crustacean'],
        'contains_crustacean' => ['Crustacean'],
    ];

    public function up(): void
    {
        foreach (self::CATEGORY_RESTRICTIONS as $restrictionName => $categories) {
            $restrictionId = DB::table('dietary_restrictions')->where('name', $restrictionName)->value('id');
            if ($restrictionId === null) {
                continue;
            }

            $missing = DB::table('foods')
                ->join('food_categories', 'food_categories.id', '=', 'foods.category_id')
                ->whereIn('food_categories.name', $categories)
                ->whereNotExists(function ($query) use ($restrictionId) {
                    $query->selectRaw('1')
                        ->from('foods_restrictions')
                        ->whereColumn('foods_restrictions.food_id', 'foods.id')
                        ->where('foods_restrictions.restriction_id', $restrictionId);
                })
                ->pluck('foods.id');

            DB::table('foods_restrictions')->insert(
                $missing->map(fn ($foodId) => [
                    'food_id' => $foodId,
                    'restriction_id' => $restrictionId,
                ])->all()
            );
        }

        // Mistyped duplicate of "Fèves" classified as a fruit
        DB::table('foods')->where('name', 'Féveroet fèves')->update(['is_valid' => 0]);
    }

    public function down(): void
    {
        // Data fix, not reversible
    }
};
