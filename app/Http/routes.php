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
// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logoutRoute']);

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('/greeting', 'Greeting@greet');

Route::model('staff', 'App\Staff');
Route::model('clients', 'App\Client');
Route::model('cars', 'App\Car');
Route::model('repairs', 'App\Repair');

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', 'RepairsController@index');

	Route::resource('cars', 'CarsController');
	Route::resource('clients', 'ClientsController');
	Route::resource('repairs', 'RepairsController');
});

Route::group(['middleware' => ['auth', 'admin']], function()
{
	Route::resource('staff', 'StaffController');

	Route::resource('cars', 'CarsController', ['except' => ['show', 'index', 'create', 'store']]);
	Route::resource('clients', 'ClientsController', ['except' => ['show', 'index', 'create', 'store']]);
	Route::resource('repairs', 'RepairsController', ['only' => ['destroy']]);
});