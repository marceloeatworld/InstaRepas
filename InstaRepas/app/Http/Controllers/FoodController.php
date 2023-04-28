<?php

namespace App\Http\Controllers;

use App\Models\CombinationFood;
use App\Models\DietaryRestriction;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\FoodRestriction;
use App\Models\FoodSeason;
use App\Models\MealCombination;
use App\Models\Season;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('admin.foods.index', compact('foods'));
    }

    public function create()
    {
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        return view('admin.foods.create', compact('categories', 'restrictions', 'seasons'));
    }

    public function store(Request $request)
    {
        $food = Food::create($request->all());

        $food->restrictions()->sync($request->input('restrictions', []));
        $food->seasons()->sync($request->input('seasons', []));

        return redirect()->route('admin.foods.index');
    }

    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    public function edit(Food $food)
    {
        $categories = FoodCategory::all();
        $restrictions = DietaryRestriction::all();
        $seasons = Season::all();
        return view('admin.foods.edit', compact('food', 'categories', 'restrictions', 'seasons'));
    }

    public function update(Request $request, Food $food)
    {
        $food->update($request->all());

        $food->restrictions()->sync($request->input('restrictions', []));
        $food->seasons()->sync($request->input('seasons', []));

        return redirect()->route('admin.foods.index');
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('admin.foods.index');
    }
}