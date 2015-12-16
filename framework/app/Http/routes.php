<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['cors'], 'prefix' => 'emberApi'],
    function () {

        Route::group(['namespace' => 'Ember\User'],
            function () {
                Route::get('users/{userId}/addresses', 'AddressController@index');
                Route::resource('users',    'UserController');
                Route::resource('userBillings', 'BillingController');
            }
        );

        Route::group(['namespace' => 'Ember\Product'],
            function () {
                Route::resource('providers', 'ProviderController');
                Route::resource('categories', 'CategoryController');
                Route::resource('products', 'ProductController');
            }
        );
    }
);
