<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;

class VisitorController extends Controller
{
    //

    public function index()
    {
        $meals = Meal::all();
        $categories = Category::all();
        return view("UserPage", compact("categories", "meals"));
    }
    public function Meal_cat($id)
    {
        $categories = Category::all();
        $cate = Category::findOrFail($id);
        $meals = $cate->meals;
        $name = $cate->cat_name;
        return view("UserPage", compact("categories", "meals", "name"));
    }
}
