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


Route::get('/', 'ProductController@index');

Route::get('/order', 'OrderController@index');
Route::match(array('GET', 'POST'),'/cart-add','OrderController@addCart')->name('cart.add');
Route::post('/order-save','OrderController@save')->name('order.save');

//  Route::resource('/order', 'OrderController');
//Route::get('/order-summary', 'OrderController@orderSummary');
//Route::get('/order-list', 'OrderController@orderList');
//Route::get('/order-user', 'OrderController@userOrder');