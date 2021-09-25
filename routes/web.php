<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/productos', function () {
    return view('product.index');
});
Route::get('/search', function () {
    return view('product.search');
})->name('search.products');



Route::post('/search', 'ProductController@search')->name('search.products');
Route::get('/users', function () {
    return view('user.admin.index');
});
Route::apiResource('apiUsers', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');





Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/sales/basket', 'SalesController@basket')->name('sales.basket');
    Route::resource('sales', 'SalesController');
    Route::resource('products', 'ProductController')->middleware('checkProduct');
    Route::resource('customer', 'CustomerController');
    Route::resource('supplier', 'SupplierController');
    //Route::get('/products/{id}/edit', 'ProductController@edit')->middleware('checkProduct');
});


Route::get('productss', function () {
    $user = Auth::user();
    return ['AuthUser' => $user];
});
