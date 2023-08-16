<?php

use App\Http\Controllers\CommandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

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
Route::get('/product/{name}', [ProductController::class, 'showByName'])->name('product.index');


Route::get('/product/search/{category}', [ProductController::class, 'searchByCategorie'])->name('product.searchByCategorie');
// Route::get('/searcha', [SearchController::class, 'search'])->name('searcha');


Route::get('/category/{category}', [ProductController::class, 'listing'])->name('category.listing');


// Route::resource('command', [CommandController::class]);
//

Route::post('command/store', [CommandController::class, 'store'])->name('command.store');








Route::get('/contact', function(){
    return view('contact');
})->name('contact');


Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('search', [SearchController::class, 'search'])->name('search');


