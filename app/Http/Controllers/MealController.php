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
        return view("Meals.index", compact("meals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("Meals.create", compact("categories"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRequest $request)
    {
        $file = $request->image;
        $path = $file?->store("Meals_Images");
        $data = $request->all();

        $data["image"] = $path;
        Meal::create($data);
        $notification = array(
            'message_id' => 'Ajouter de ropas avec success',
            'alert-type' => 'success'
        );
        // return redirect()->back()->with("success","Ajouter de ropas avec success");
        return redirect()->route("Meal.index")->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $meal = Meal::find($id);
        $categories = Category::all();
        return view("Meals.edit", compact("meal", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MealRequest $request, $id)
    {
        $meal = Meal::find($id);
        $file = $request->image;
        $path = $file?->store("Meals_Images");
        $data = $request->all();
        $data["image"] = $path;
        if (isset($meal->image))
            Storage::delete($meal->image);
        $meal->update($data);
        $notification = array(
            'message_id' => 'Modification de ropas avec success',
            'alert-type' => 'success'
        );
        return redirect()->route("Meal.index")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        // Meal::destroy($meal->id);
        // $notification = array(
        //     'message_id' => 'supprimer de ropas avec success',
        //     'alert-type' => 'success'
        // );
        // return redirect()->back()->with("success","Ajouter de ropas avec success");
        // return redirect()->back()->with("notification");

    }

    public function Supprimer($id)
    {
        $meal = Meal::find($id);
        if (isset($meal->image))
            Storage::delete($meal->image);
        $meal->delete();
        $notification = array(
            'message_id' => 'supprimer de ropas avec success',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
