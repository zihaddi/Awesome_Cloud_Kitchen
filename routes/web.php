<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Products :
    Route::get('/products', [ProductController::class, 'view'])->name('products');
    Route::get('/productDetails/{id}', [ProductController::class, 'productDetails'])->name('productDetails');
    Route::get('/productAdd', [ProductController::class, 'add'])->name('productAdd');
    Route::post('/productsAdd', [ProductController::class, 'postadd']);
    Route::get('/productDelete/{id}', [ProductController::class, 'delete'])->name('productDelete');
    Route::get('/productEdit', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('/productsEdit', [ProductController::class, 'postedit']);

    //Category
    Route::get('/categories', [CategoryController::class, 'view'])->name('categories');
    Route::get('/categoryAdd', [CategoryController::class, 'addCategory'])->name('categoryAdd');
    Route::post('/categoriesAdd', [CategoryController::class, 'postaddCategory']);
    Route::get('/categoryDelete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
    Route::get('/categoryEdit', [CategoryController::class, 'edit'])->name('categoryEdit');
    Route::post('/categoriesEdit', [CategoryController::class, 'postedit']);


    // Users :
    Route::get('/users', [UserController::class, 'view'])->name('users');
    Route::get('/userAdd', [UserController::class, 'addUser'])->name('userAdd');
    Route::post('api/fetch-places', [UserController::class, 'fetchPlace']);
    Route::post('/usersAdd', [UserController::class, 'postaddUser']);
    
    // Address :
    //    Country
    Route::get('/locations', [LocationController::class, 'viewCountry'])->name('locations');
    Route::get('/countryEdit', [LocationController::class, 'editCountry'])->name('countryEdit');
    Route::post('/countriesEdit', [LocationController::class, 'posteditCountry']);
    Route::get('/countryDelete', [LocationController::class, 'deleteCountry'])->name('countryDelete');
    Route::post('/countriesDelete', [LocationController::class, 'postdeleteCountry']);
    Route::get('/countryAdd', [LocationController::class, 'addCountry'])->name('countryAdd');
    Route::post('/countriesAdd', [LocationController::class, 'postaddCountry']);

    //city :
    Route::get('/cityAdd', [LocationController::class, 'addCity'])->name('cityAdd');
    Route::post('/citiesAdd', [LocationController::class, 'postaddCity']);

    //Place :
    Route::get('/placeAdd', [LocationController::class, 'addPlace'])->name('placeAdd');
    Route::post('api/fetch-cities', [LocationController::class, 'fetchCity']);
    Route::post('/placesAdd', [LocationController::class, 'postaddPlace']);


    //Dashboard :
    Route::get('/dashboards', [DashboardController::class, 'view'])->name('dashboards');

    //ingredients 
    Route::get('/ingredients', [IngredientController::class, 'view'])->name('ingredients');
    Route::get('/ingredientAdd', [IngredientController::class, 'addIngredient'])->name('ingredientAdd');
    Route::post('/ingredientsAdd', [IngredientController::class, 'postaddIngredient']);
   

    //Ingredient_category :
    Route::get('/ingredientCategories', [IngredientCategoryController::class, 'view'])->name('ingredientCategories');
    Route::get('/ingredientCategoryAdd', [IngredientCategoryController::class, 'addIngredientCategoty'])->name('ingredientCategoryAdd');
    Route::post('/ingredientcategoriesAdd', [IngredientCategoryController::class, 'postaddIngredientCategories']);
    Route::get('/clearCart', [ProductController::class, 'clearCart'])->name('clearCart');
    Route::get('/productCheckout', [ProductController::class, 'productCheckout'])->name('productCheckout');
    Route::get('/productDetails', [ProductController::class, 'productDetails'])->name('productDetails');
    
    
});

require __DIR__.'/auth.php';
