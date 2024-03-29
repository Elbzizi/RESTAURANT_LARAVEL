<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categorys = Category::paginate(4);
        return view("Category.index", compact("categorys"));
    }

    public function store(Request $request)
    {
        $request->validate(["cat_name" => "required|string|unique:categories|min:3|max:40"]);
        Category::create($request->all());
        return redirect()->back()->with("success", "category bien ajouter ");
    }

    public function Supprimer(string $id)
    {
        Category::destroy($id);
        return redirect()->back()->with("success", "le categorie bien supprimer");
    }

    public function Update(Request $request)
    {
        $request->validate(["cat_name" => "required|string|unique:categories|min:3|max:40"]);
        Category::find($request->id)->update(["cat_name" => $request->cat_name]);
        return redirect()->back()->with("success", "le categorie bien Modefier");
    }
}