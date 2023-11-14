<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;

Route::get("/products", [ProductController::class,"index"]);
Route::get('create-product', [ProductController::class, 'create'])->Middleware('auth');
Route::post('store-product', [ProductController::class, 'store'])->Middleware('auth');
Route::get('/products/{id}', [ProductController::class, 'details']); 
Route::delete('/products/{id}', [ProductController::class, 'destroy_product'])->Middleware('auth');
Route::get('edit-product/{id}', [ProductController::class, 'edit_product'])->Middleware('auth');;
Route::patch('/products/{id}', [ProductController::class, 'update_product'])->Middleware('auth');

Route::get('create-category', [ProductController::class, 'create_category'])->Middleware('auth');
Route::post('store-category', [ProductController::class, 'store_category'])->Middleware('auth');
Route::get('categories',  [ProductController::class, 'show_categories']);
Route::get('/categories/{id}', [ProductController::class, 'show_category_products']);

Route::get("/", [ProductController::class,"index"]);    

 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
