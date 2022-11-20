<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/create','CategoryController@create');

Route::resource('category', 'CategoryController');
Route::resource('food', 'FoodController');
Route::get('/','FoodController@listfood')->name('listfood');

// either use the above  OR state the route for each method manually as used below...

// Route::get('/category/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
// Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create']);
// Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/show', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
// Route::get('/category/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/category/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
// Route::delete('/category/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');


