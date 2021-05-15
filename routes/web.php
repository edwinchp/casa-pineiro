<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
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







Route::group(['middleware' => 'auth'], function () {
    Route::view('/', 'index');
    Route::resource('products', 'ProductController');
    Route::resource('sales', 'SalesController');
});




Route::get('productss', function () {
    $userStore = User::find(Auth::id());
    //$stores = $user->stores;




    //echo $user->name . '<br>';
    //echo App\Product::paginate(3) . '<br>';
    //echo $auth . '<br>';
    echo $userStore . '<br>';
    //echo $store->name . '<br>';

    //  foreach($user->stores as $store){
    //      echo "Tienda: " . $store->id . '<br>';

    //     foreach($store->products as $product){
    //         echo ' -' .$product->name . '<br>';
    //     }
    //  }

    // foreach ($user->getUserProducts(3) as $product) {
    //     echo $product->name . '<br>';
    // }


    //return dd($store->products);
});
