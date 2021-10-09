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

//Validamos que el usuario que suministro sus datos para realizar la compra pueda visualizar sus ordenes 
Route::group(['middleware' => 'auth.customer'], function () {
    Route::get('/order-user', 'OrderController@userOrder');
});

Route::get('/', 'ProductController@index');
Route::get('/order', 'OrderController@index');
Route::get('/order-pay/{id_order}', 'OrderController@pay');
Route::get('/order-return/{id_order}', 'OrderController@orderReturn');
Route::get('/responsePay', 'OrderController@responsePay');
Route::match(array('GET', 'POST'),'/cart-add','OrderController@addCart')->name('cart.add');
Route::post('/order-save','OrderController@save')->name('order.save');
Route::get('/order-list', 'OrderController@orderList');

