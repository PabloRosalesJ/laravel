<?php

use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'home');

Route::resource('people', 'PersonController')->only('index', 'show');
// Route::get('people/{person:slug}', 'PersonController@show')->name('people.show');

Route::resource('buyer', 'BuyerController')->except('create', 'edit');


Route::resource('seller', 'SellerController')->except('create', 'edit');


Route::resource('products', 'ProductController')->only('index', 'create', 'update', 'store');

Route::resource('categories', 'CategoryController')->only('index', 'create', 'update','store');

Route::resource('credit', 'CreditController');

Auth::routes();

