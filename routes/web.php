<?php

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


Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);

Route::post('/checkout', [
    'ues' => 'ProductController@postCheckout',
    'as' => 'checkout'
]);

Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => 'guest'], function() {
        Route::group(['middleware'=>'guest'],function() {
            Route::get('/signup', [
                'uses' => 'UserController@getSignup',
                'as' => 'user.signup'
            ]);
            Route::post('/signup', [
                'uses' => 'UserController@postSignup',
                'as' => 'user.signup'
            ]);
            Route::get('/signin', [
                'uses' => 'UserController@getSignin',
                'as' => 'user.signin'
            ]);
            Route::post('/signin', [
                'uses' => 'UserController@postSignin',
                'as' => 'user.signin'
            ]);
        });
    });
    Route::group(['middleware' => 'auth'], function() {
        Route::group(['middleware'=>'auth'],function() {
            Route::get('/profile', [
                'uses' => 'UserController@getProfile',
                'as' => 'user.profile'
            ]);
            Route::get('/cancel/{id}', [
                'uses'  => 'UserController@getCancelorder',
                'as'    => 'cancel'
            ]);
            Route::post('/cancel/{id}', [
                'uses'  => 'UserController@postCancelorder',
                'as'    => 'cancel'
            ]);
            Route::get('/logout', [
                'uses' => 'UserController@getLogout',
                'as' => 'user.logout'
            ]);
            Route::get('/order', [
                'uses' => 'ProductController@getOrder',
                'as' => 'order'
            ]);
            Route::post('/order', [
                'uses' => 'ProductController@postOrder',
                'as' => 'order'
            ]);
            Route::get('/review/{id}', [
                'uses' => 'ProductController@getReview',
                'as' => 'review'
            ]);
            Route::post('/review/{id}', [
                'uses' => 'ProductController@postReview',
                'as' => 'review'
            ]);

            // CRUD product
            Route::resource('/items', 'ItemController');
        });
    });
});