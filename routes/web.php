<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    Route::get('/categoryEdit', [ProductController::class, 'edit'])->name('categoryEdit');
    Route::post('/categoriesEdit', [ProductController::class, 'postedit']);
    
});

require __DIR__.'/auth.php';
