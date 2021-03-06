<?php

use Illuminate\Http\Request;

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

Route::post('login', 'WebApi@login');
Route::post('register', 'WebApi@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('order', 'Order\OrderController@orderSave');
Route::get('order', 'Order\OrderController@orders');
Route::get('products', 'Products\ProductsController@products');
});

