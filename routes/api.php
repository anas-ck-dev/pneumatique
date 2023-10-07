<?php

use App\Http\Controllers\api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => ['api', 'checkPassword']], function () {
//     Route::post('/categories', [CategoriesController::class, 'index'])
//         ->name('categories.listing');
//     Route::post('/category/{id}', [CategoriesController::class, 'getCategoryById'])
//         ->name('category.listing');
//     Route::post('/change_category_status', [CategoriesController::class, 'changecategory_status'])
//         ->name('category.listing');
// });
