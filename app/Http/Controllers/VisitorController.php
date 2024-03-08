<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

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
        $meals = $categories->where("id", $id)->Meal();
        $name = $meals->Category->cat_name;
        return view("UserPage", compact("categories", "meals", "name"));
    }
}
