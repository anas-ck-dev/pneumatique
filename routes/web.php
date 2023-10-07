<?php

use App\Http\Controllers\CommandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;



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

Route::get('/product/{name}', [ProductController::class, 'showByName'])->name('product.index');


Route::get('/product/search/{category}', [ProductController::class, 'searchByCategorie'])->name('product.searchByCategorie');
// Route::get('/searcha', [SearchController::class, 'search'])->name('searcha');


Route::get('search', [ProductController::class, 'search'])->name('search');
// Route::resource('command', [CommandController::class]);
//



Route::post('command/store', [CommandController::class, 'store'])->name('command.store');

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', [ProductController::class, 'index'])->name('home');
    
    
    Route::group(['middleware' => ['guest']], function() {

        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        /**
         * panier Routes
         */
        
    });

    Route::group(['middleware' => ['auth']], function () { 
        // Logout Routes
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::get('cart', [ProductController::class, 'cart'])->name('cart');
        Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
        Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
        Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');

    });
});


Route::get('/contact', function(){
    return view('contact');
})->name('contact');
Route::get('/thanku', function(){
    return view('thanku');
})->name('thanku');
Route::get('/about', function(){
    return view('about');
})->name('about');


// Route::get('/product/sort', [ProductController::class, 'sort'])->name('sort');

