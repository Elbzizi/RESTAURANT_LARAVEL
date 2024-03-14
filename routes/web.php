<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware("is_admin");
Route::get('/user', [HomeController::class, 'user'])->name('user');


// Category
// Route::resource('category',CatecoryController::class);
// Route::get('/deleteCategory{id}',[CatecoryController::class,'Supprimer'])->name("subCat");
// 
Route::controller(CategoryController::class)->group(function () {
    Route::get("/category", 'index')->name("category.index");
    Route::get("/Deletecategory{id}", 'Supprimer')->name("category.delete");
    Route::post("/Storecategory", 'store')->name("category.store");
    Route::post("/Updatecategory", 'Update')->name("category.update");
})->middleware(['Auth', 'is_admin']);
// Mael
Route::resource("/Meal", MealController::class);
Route::get("/DeleteMeals{id}", [MealController::class, 'Supprimer'])->name("Meal.supp");




// parte user
Route::get('/', [VisitorController::class, 'index'])->name('Visitor');
Route::get('/cat_pro{id}', [VisitorController::class, 'Meal_cat'])->name('cat_pro');

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//     // Uses first & second middleware...
//     });
