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
Route::get('/search', function () {
    return view('product.search');
})->name('search.products');



Route::post('/search', 'ProductController@search')->name('search.products');
Route::get('/users', function () {
    return view('user.admin.index');
});
Route::apiResource('apiUsers', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');







Route::group(['middleware' => 'auth'], function(){
    Route::view('/', 'index');
    Route::resource('products', 'ProductController');
    Route::resource('sales', 'SalesController');

});




Route::get('productss', function(){
    $user = App\User::find(1);
    //$stores = $user->stores;
    


    echo $user->name . '<br>';
    //echo $user->stores[0]->name . '<br>';
    //echo $store->name . '<br>';

     foreach($user->stores as $store){
         echo "Tienda: " . $store->name . '<br>';

        foreach($store->products as $product){
            echo ' -' .$product->name . '<br>';
        }
     }


    //return dd($store->products);
});


