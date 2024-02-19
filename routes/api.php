<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('Check-Password')
->namespace('App\Http\Controllers\Api')
->prefix('users')
->group(function () {

     Route::get('/', 'UserController@index');
     Route::get('/show/{id}', 'UserController@show');
 });


Route::middleware(['Check-Password','jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('products')
->group(function () {

     Route::get('/', 'ProductController@index');
     Route::get('/show/{id}', 'ProductController@show');

});

Route::middleware('Localization')
->namespace('App\Http\Controllers\Api')->group(function(){
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refreshToken');

});

Route::middleware(['Check-Password','jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('categories')
->group(function () {

     Route::get('/', 'CategoryController@index');
     Route::get('/show/{id}', 'CategoryController@show');

});


Route::middleware(['Check-Password','jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('subcategories')
->group(function () {

     Route::get('/', 'SubcategoryController@index');
     Route::get('/show/{id}', 'SubcategoryController@show');

});

Route::middleware(['jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('carts')
->group(function () {

     Route::post('/store', 'CartController@store');
     Route::get('/show/{id}', 'CartController@show');
     Route::patch('/update/{id}', 'CartController@update');
     Route::delete('/delete/{id}', 'CartController@destroy');

});


Route::middleware(['jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('orders')
->group(function () {

     Route::post('/store', 'OrderController@store');
     Route::get('/show/{id}', 'OrderController@show');
     Route::patch('/update/{id}', 'OrderController@update');
     Route::delete('/delete/{id}', 'OrderController@destroy');
});


Route::middleware(['jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('wishlists')
->group(function () {

     Route::get('/', 'WishlistController@index');
     Route::post('/store', 'WishlistController@store');
     Route::get('/show/{id}', 'WishlistController@show');
     Route::patch('/update/{id}', 'WishlistController@update');
     Route::delete('/delete/{id}', 'WishlistController@destroy');
});


Route::middleware(['jwt-verfiy','Localization'])
->namespace('App\Http\Controllers\Api')
->prefix('skus')
->group(function () {

     Route::get('/', 'SkuController@index');
     Route::get('/show/{id}', 'SkuController@show');
});


Route::middleware(['jwt-verfiy','Check-Password'])
->namespace('App\Http\Controllers\Api')
->prefix('settings')
->group(function () {

     Route::get('/show/{id}', 'SettingController@show');
});











