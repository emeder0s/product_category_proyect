<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

//Rutas de categorias
Route::get('all-categories',[CategoryController::class, 'index']);
Route::get('show-category/{id}',[CategoryController::class, 'show']);
Route::post('new-category',[CategoryController::class, 'store']);
Route::put('modify-category/{id}',[CategoryController::class, 'update']);
Route::delete('delete-category/{id}',[CategoryController::class, 'destroy']);

//Rutas de productos
Route::get('all-products',[ProductController::class, 'index']);
Route::get('show-product/{id}',[ProductController::class, 'show']);
Route::post('new-product',[ProductController::class, 'store']);
Route::put('modify-product/{id}',[ProductController::class, 'update']);
Route::delete('delete-product/{id}',[ProductController::class, 'destroy']);

