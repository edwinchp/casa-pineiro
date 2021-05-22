<?php

use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/products', 'ProductController@index');

// Route::prefix('/product')->group(function () {
//     Route::post('/store', 'ProductController@store');
//     Route::put('/{id}', 'ProductController@update');
//     Route::delete('/{id}', 'ProductController@destroy');
// });

Route::post('/login', 'ApiUserController@login');
Route::middleware('auth:api')->get('/current', 'ApiUserController@currentUser');

Route::resource('products', 'ApiProductController');
Route::resource('sales', 'ApiSalesController');
Route::get('allProducts', 'ApiProductController@allProducts');
Route::get('allSales', 'ApiSalesController@allSales');
Route::middleware('auth:api')->get('testing-products', 'ApiProductController@testingProducts');




/**
 * STORES
 */
Route::get('user/stores', 'ApiStoreController@getUserStores');
