<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/buyer/{params}', 'BuyerController@getByParams')->name('api.buyer.byParams');

Route::get('/buyer/{id}', 'BuyerController@getById')->name('api.buyer.getById');

Route::get('/product/{params}', 'ProductController@getByParams')->name('api.product.byParams');

Route::get('/product/getById/{id}', 'ProductController@getById')->name('api.product.show');
