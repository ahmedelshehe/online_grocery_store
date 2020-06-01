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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'admin'],function (){
    Route::get('/admin',function (){
        return view('admin.index');
    });
    Route::resource('/admin/products','AdminProductsController');
    

});
Route::resource('/products','UserProductsController');
Route::post('/addToCart/{product}', 'UserProductsController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'UserProductsController@showCart')->name('cart.show');
Route::get('/checkout/{amount}', 'UserProductsController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'UserProductsController@charge')->name('cart.charge');
Route::resource('/home/orders','OrderController')->middleware('auth');

