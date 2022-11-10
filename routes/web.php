<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@main')->name('main');

Route::group(['prefix' => 'g', 'middleware' => 'token'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/product/{product}', 'HomeController@product')->name('product.show');
    Route::get('/cart', 'HomeController@cart')->name('cart');
    Route::get('/categories/{category}', 'CategoryController@index')->name('product.category');
    Route::get('/order', 'HomeController@storeOrder')->name('store.order');
});

Route::group(['namespace' => 'Dashboard'], function () {

    Route::get('login', 'AuthController@index')->name('login');
    Route::post('login', 'AuthController@postLogin')->name('login.post');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'is.admin'], 'as' => 'dashboard.'], function () {
        Route::get('/index', 'AdminController@index')->name('index');
        Route::resource('products', 'ProductController', ['except' => ['show']]);
        Route::get('/users', 'UserController@index')->name('users');
        Route::resource('categories', 'CategoryController', ['except' => ['show']]);
        Route::resource('meals', 'MealController', ['except' => ['show']]);
        Route::resource('tables', 'TableController', ['except' => ['show']]);
        Route::resource('orders', 'OrderController', ['only' => ['index', 'show', 'update', 'destroy']]);
        Route::get('comments', 'CommentController@index')->name('comments.index');
        Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.delete');
    });
});


Route::get('/migrate', function(){
    \Artisan::call('migrate');
    echo "<pre>";
    return \Artisan::output();
});
