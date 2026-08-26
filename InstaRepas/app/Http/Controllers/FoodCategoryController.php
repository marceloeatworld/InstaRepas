<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;
class FoodCategoryController extends Controller
{
    public function index()
    {
        $categories = FoodCategory::all();
    
        return view('admin.food-categories.index', compact('categories'));
    }
    

    public function create()
    {
        return view('admin.food-categories.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:food_categories,name',
        ]);

        FoodCategory::create($data);
        return redirect()->route('admin.food-categories.index');
    }
    public function edit(FoodCategory $food_category)
{
    return view('admin.food-categories.edit', compact('food_category'));
}

public function update(Request $request, FoodCategory $food_category)
{
    $data = $request->validate([
        'name' => 'required|string|max:100|unique:food_categories,name,'.$food_category->id,
    ]);

    $food_category->update($data);
    return redirect()->route('admin.food-categories.index');
}

public function show(FoodCategory $food_category)
{
    return view('admin.food-categories.show', compact('food_category'));
}

public function destroy(FoodCategory $food_category)
{
    $food_category->delete();
    return redirect()->route('admin.food-categories.index');
}

    
}
