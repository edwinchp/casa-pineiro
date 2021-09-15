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







Route::middleware('auth:api')->group(function () {
    // Users
    Route::get('user/stores', 'ApiStoreController@getUserStores');
    // Products
    Route::get('products/barcode-search', 'ApiProductController@barcodeSearch');
    Route::resource('products', 'ApiProductController');
    Route::get('allProducts', 'ApiProductController@allProducts');
    // Store
    // Sales
    Route::resource('sales', 'ApiSalesController');
    Route::get('allSales', 'ApiSalesController@allSales');
    // Testing
    Route::get('testing-products', 'ApiProductController@testingProducts');
    Route::post('/logout', 'ApiUserController@logout');
    Route::get('/current-user', 'ApiUserController@currentUser');

    // Picture
    Route::resource('/picture', 'PictureController');

    //Customer
    Route::resource('customer', 'ApiCustomerController');
});

/**
 * STORES
 */
//Route::get('user/stores', 'ApiStoreController@getUserStores');
