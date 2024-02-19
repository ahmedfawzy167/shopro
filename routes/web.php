<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------- ------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
   Route::middleware(['auth:admin','Check-Authorize','Language','Check-Session'])
   ->namespace('App\Http\Controllers\Dashboard')
   ->prefix('admin')
   ->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::get('/profile','ProfileController@show')->name('profile.show');
    Route::get('/profile/edit','ProfileController@edit')->name('profile.edit');
    Route::put('/profile/update/{id}','ProfileController@update')->name('profile.update');
    Route::get('/language/{locale}', 'LanguageController@changeLanguage')->name('change.language');

                  // Users Routes//

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::get('/users/show/{id}', 'UserController@show')->name('users.show');
    Route::put('/users/update/{id}', 'UserController@update')->name('users.update');
    Route::delete('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

                    // Product Routes//

    Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::post('/products/store', 'ProductController@store')->name('products.store');
    Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
    Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');
    Route::put('/products/update/{id}', 'ProductController@update')->name('products.update');
    Route::delete('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
    Route::get('/products/trashed', 'ProductController@trashed')->name('products.trash');
    Route::put('/products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::delete('/products/delete/{id}', 'ProductController@delete')->name('products.delete');

                      // Categories Routes//

    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::get('/categories/show/{id}', 'CategoryController@show')->name('categories.show');
    Route::put('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::get('/categories/trashed', 'CategoryController@trashed')->name('categories.trash');
    Route::put('/categories/restore/{id}', 'CategoryController@restore')->name('categories.restore');
    Route::delete('/categories/delete/{id}', 'CategoryController@delete')->name('categories.delete');

             // subcategories Routes//

    Route::get('/subcategories', 'SubcategoryController@index')->name('subcategories.index');
    Route::get('/subcategories/create', 'SubcategoryController@create')->name('subcategories.create');
    Route::post('/subcategories/store', 'SubcategoryController@store')->name('subcategories.store');
    Route::get('/subcategories/edit/{id}', 'SubcategoryController@edit')->name('subcategories.edit');
    Route::get('/subcategories/show/{id}', 'SubcategoryController@show')->name('subcategories.show');
    Route::put('/subcategories/update/{id}', 'SubcategoryController@update')->name('subcategories.update');
    Route::delete('/subcategories/destroy/{id}', 'SubcategoryController@destroy')->name('subcategories.destroy');
    Route::get('/subcategories/trashed', 'SubcategoryController@trashed')->name('subcategories.trash');
    Route::put('/subcategories/restore/{id}', 'SubcategoryController@restore')->name('subcategories.restore');
    Route::delete('/subcategories/delete/{id}', 'SubcategoryController@delete')->name('subcategories.delete');

             // customers Routes//
    Route::get('/customers', 'CustomerController@index')->name('customers.index');
    Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
    Route::post('/customers/store', 'CustomerController@store')->name('customers.store');
    Route::get('/customers/edit/{id}', 'CustomerController@edit')->name('customers.edit');
    Route::get('/customers/show/{id}', 'CustomerController@show')->name('customers.show');
    Route::put('/customers/update/{id}', 'CustomerController@update')->name('customers.update');
    Route::delete('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');

                // cities Routes//
    Route::get('/cities', 'CityController@index')->name('cities.index');
    Route::get('/cities/edit/{id}', 'CityController@edit')->name('cities.edit');
    Route::get('/cities/show/{id}', 'CityController@show')->name('cities.show');
    Route::put('/cities/update/{id}', 'CityController@update')->name('cities.update');
    Route::delete('/cities/destroy/{id}', 'CityController@destroy')->name('cities.destroy');
    Route::get('/cities/trashed', 'CityController@trashed')->name('cities.trash');
    Route::put('/cities/restore/{id}', 'CityController@restore')->name('cities.restore');
    Route::delete('/cities/delete/{id}', 'CityController@delete')->name('cities.delete');

                // settings Routes//
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::get('/settings/create', 'SettingController@create')->name('settings.create');
    Route::post('/settings/store', 'SettingController@store')->name('settings.store');
    Route::get('/settings/edit/{id}', 'SettingController@edit')->name('settings.edit');
    Route::put('/settings/update/{id}', 'SettingController@update')->name('settings.update');
    Route::delete('/settings/destroy/{id}', 'SettingController@destroy')->name('settings.destroy');

                // skus Routes//
    Route::get('/skus', 'SkuController@index')->name('skus.index');
    Route::get('/skus/create', 'SkuController@create')->name('skus.create');
    Route::post('/skus/store', 'SkuController@store')->name('skus.store');
    Route::get('/skus/show/{id}', 'SkuController@show')->name('skus.show');
    Route::get('/skus/edit/{id}', 'SkuController@edit')->name('skus.edit');
    Route::put('/skus/update/{id}', 'SkuController@update')->name('skus.update');
    Route::delete('/skus/destroy/{id}', 'SkuController@destroy')->name('skus.destroy');

             // specs Routes//
    Route::get('/specs', 'SpecController@index')->name('specs.index');
    Route::get('/specs/show/{id}', 'SpecController@show')->name('specs.show');
    Route::get('/specs/edit/{id}', 'SpecController@edit')->name('specs.edit');
    Route::put('/specs/update/{id}', 'SpecController@update')->name('specs.update');
    Route::delete('/specs/destroy/{id}', 'SpecController@destroy')->name('specs.destroy');

    Route::get('/orders', 'OrderController@index')->name('orders.index');

});


Auth::routes();


