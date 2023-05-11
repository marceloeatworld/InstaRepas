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
        $category = FoodCategory::create($request->all());
        return redirect()->route('food-categories.index');
    }
    
    public function edit(FoodCategory $category)
    {
        return view('admin.food-categories.edit', compact('category'));
    }
    
    public function update(Request $request, FoodCategory $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.food-categories.index');
    }
    

    public function show(FoodCategory $category)
    {
        return view('admin.food-categories.show', compact('category'));
    }
    


    public function destroy(FoodCategory $category)
    {
        $category->delete();
    
        return redirect()->route('admin.food-categories.index');
    }
    
}
