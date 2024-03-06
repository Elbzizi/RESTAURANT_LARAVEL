<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //

    public function index(){
        $categories=Category::all();

        return view("UserPage",compact("categories"));
    }
}
