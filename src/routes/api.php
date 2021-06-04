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
Route::get('/hot-product', 'ProductController@hotProduct');
Route::get('/product', 'ProductController@Product');
Route::get('/categorylist', 'ProductController@showcategories');
Route::get('/category/{id}', 'ProductController@show_product_category');
Route::get('/slide', 'Admin\SliderController@getslider');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
