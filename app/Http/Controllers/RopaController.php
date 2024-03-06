<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequest;
use App\Models\Category;
use App\Models\Ropa;
use Illuminate\Http\Request;

class RopaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ropas=Ropa::all();
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
        $file = $request->image;
        $path = $file?->store("Meals_Images");
        $data = $request->all();

        $data["image"] = $path;
        dd($data);
        Ropa::create($data);
        $notification = array(
            'message_id' => 'Ajouter de ropas avec success',
            'alert-type' => 'info'
        );
        // return redirect()->back()->with("success","Ajouter de ropas avec success");
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ropa $ropa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ropa $ropa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ropa $ropa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ropa $ropa)
    {
        //
    }
}
