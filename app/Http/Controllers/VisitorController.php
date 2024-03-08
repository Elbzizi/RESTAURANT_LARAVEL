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
        $meals = Meal::where("category", $id)->get();
        $categories = Category::all();
        return view("UserPage", compact("categories", "meals"));
    }
}
