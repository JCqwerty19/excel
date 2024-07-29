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

Route::get('/products/export', 'ProductController@export')->name('products.export');
Route::post('/products/export', 'ProductController@import')->name('products.save');

Route::get('/products/list', 'ProductController@list')->name('products.list');

Route::get('/products/show/{product}', 'ProductController@show')->name('products.show');