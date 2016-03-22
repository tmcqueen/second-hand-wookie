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
    Route::resource('events', 'EventsController', [
        'parameters' => 'singular',
    ]);
    Route::resource('inventory', 'InventoryController', [
        'parameters' => ['inventory' => 'asset'],
    ]);
    Route::resource('/donate', 'DonationController');
});

// Route::get('/inventory', ['as' => 'inventory', 'uses' => 'InventoryController@index']);
// Route::get('/inventory/{asset}', ['as' => 'asset', 'uses' => 'InventoryController@show']);


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/me', ['uses' => 'PublicProfileController@index']);
    Route::resource('/me/settings', 'SettingsController');
});

Route::get('/changelog', function() {
    $status = file_get_contents('../STATUS.md');
    return view('changelog')->with('status', Markdown::convertToHtml($status));
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth'],
    'namespace' => 'Admin',
], function() {
    Route::resource('users', 'AdminUsersController', [
        'parameters' => 'singular',
        'middleware' => 'can:admin.users']);
    Route::resource('inventory', 'AdminInventoryController', [
        'parameters' => ['inventory' => 'asset'],
        'middleware' => 'can:admin.assets']);


});