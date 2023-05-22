<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutritionInfoController extends Controller
{
    public function index()
    {
        return view('NutritionInfo');
    }
}
