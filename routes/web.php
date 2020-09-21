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

Route::get('/', 'ProductController@index')->name('product.index');
Route::resource('products', 'ProductController');
Route::get('/search', function(){
    return view('product.search');
})->name('search.products');
Route::post('/search', 'ProductController@search')->name('search.products');
