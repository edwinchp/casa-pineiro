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
    Route::get('/', 'DashboardController@index')->name('/');
    Route::get('/sales/basket', 'SalesController@basket')->name('sales.basket');
    Route::resource('sales', 'SalesController');
    Route::resource('products', 'ProductController')->middleware('checkProduct');
    Route::resource('customer', 'CustomerController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('location', 'LocationController');
    Route::get('/register', 'UserController@create');
    Route::post('/register', 'UserController@store')->name('register');

    //Route::get('/products/{id}/edit', 'ProductController@edit')->middleware('checkProduct');
});



Route::get('productss', function () {
    $user = Auth::user();
    return ['AuthUser' => $user];
});

Route::get('/login2', function () {
   
    return view('auth.login2');
});