<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::get('/events', ['as' => 'events', 'uses' => 'HomeController@events']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('@{user}', ['uses' => 'PublicProfileController@index']);
    Route::resource('/inventory', 'InventoryController', ['parameters' => [
        'inventory' => 'asset',
    ]]);
    Route::resource('/donate', 'DonationController');
    Route::get('/me', function(){
        return Auth::user()->name;
    });
});

// Route::get('/inventory', ['as' => 'inventory', 'uses' => 'InventoryController@index']);
// Route::get('/inventory/{asset}', ['as' => 'asset', 'uses' => 'InventoryController@show']);


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::resource('/settings', 'SettingsController');
});
