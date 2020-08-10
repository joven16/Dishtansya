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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Route::get('country', 'Country\CountryController@country');
// // Route::get('country/{id}', 'Country\CountryController@countryByID');
// // Route::post('country', 'Country\CountryController@countrySave');
// // Route::put('country/{id}', 'Country\CountryController@countryUpdate');
// // Route::delete('country/{id}', 'Country\CountryController@countryDelete');
// Route::group(['middleware' => 'auth:api'], function(){
//     Route::apiResource('country', 'Country\Country');
// });


Route::post('login', 'WebApi@login');
Route::post('register', 'WebApi@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('order', 'Order\OrderController@orderSave');
Route::get('order', 'Order\OrderController@orders');
Route::get('products', 'Products\ProductsController@products');
});