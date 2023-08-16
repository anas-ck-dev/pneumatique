<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/{name}', [ProductController::class, 'showByName']);


Route::get('/product/search/{category}', [ProductController::class, 'searchByCategorie'])->name('product.searchByCategorie');

Route::get('/product/search/{category}', [ProductController::class, 'searchByCategorie'])->name('product.searchByCategorie');



Route::get('/category/{category}', [ProductController::class, 'listing'])->name('category.listing');













Route::get('/contact', function(){
    return view('contact');
})->name('contact');


Route::get('/about', function(){
    return view('about');
})->name('about');
