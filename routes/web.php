<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('products', 'ProductController');
Route::get('/search', function () {
    return view('product.search');
})->name('search.products');



Route::post('/search', 'ProductController@search')->name('search.products');
Route::get('/users', function () {
    return view('user.admin.index');
});
Route::apiResource('apiUsers', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/sell/create', function () {
    return view('sell.create');
});

Route::get('/', function () {
    return view('index');
});
