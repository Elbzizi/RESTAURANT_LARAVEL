<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequest;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meal::all();
        dd($meals);
        return view("Meals.index", compact("meals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Meals.create', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRequest $request)
    {

        // $file = $request->image;
        // $path = $file?->store("Meals_Images");
        // $data = $request->all();

        // $data["image"] = $path;
        // dd($data);
        // Meal::create($data);
        // $notification = array(
        //     'message_id' => 'Ajouter de ropas avec success',
        //     'alert-type' => 'info'
        // );
        // // return redirect()->back()->with("success","Ajouter de ropas avec success");
        // return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MealRequest $request, Meal $meal)
    {
        $file = $request->image;
        $path = $file?->store("Meals_Images");
        $data = $request->all();
        $data["image"] = $path;
        $Meal = Meal::find($meal);
        if (isset($Meal->image))
            Storage::delete($Meal->image);
        Meal::update($data);
        return redirect()->back()->with("success", "Modifier de ropas avec success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        Meal::destroy($meal);
        return redirect()->back()->with("success", "Supprimer de ropas avec success");
    }
}
