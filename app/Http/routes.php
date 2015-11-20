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

// Password reset link request routes...
Route::get('password/email', ['uses'=> 'Auth\PasswordController@getEmail', 'as'=>'resetRoute']);
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset/{token}', 'Auth\PasswordController@postReset');

Route::model('staff', 'App\Staff');
Route::model('clients', 'App\Client');
Route::model('cars', 'App\Car');
Route::model('repairs', 'App\Repair');
Route::model('users', 'App\User');

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', 'RepairsController@index');

	Route::resource('cars', 'CarsController');
	Route::resource('clients', 'ClientsController');
	Route::resource('repairs', 'RepairsController');

	Route::get('logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logoutRoute']);

	Route::get('reports/daily', ['uses' => 'ReportsController@dailyRepairs', 'as' => 'reports.daily']);
	Route::get('reports/unpaid', ['uses' => 'ReportsController@unpaidRepairs', 'as' => 'reports.unpaid']);
	Route::get('reports/ongoing', ['uses' => 'ReportsController@ongoingRepairs', 'as' => 'reports.ongoing']);
});

Route::group(['middleware' => ['auth', 'admin']], function()
{
	Route::resource('staff', 'StaffController');

	Route::resource('cars', 'CarsController', ['except' => ['show', 'index', 'create', 'store']]);
	Route::resource('clients', 'ClientsController', ['except' => ['show', 'index', 'create', 'store']]);
	Route::resource('repairs', 'RepairsController', ['only' => ['destroy']]);

	// Registration routes...
	Route::get('register', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'registerRoute']);
	Route::post('register', 'Auth\AuthController@postRegister');

	Route::resource('users','UserController',['except'=>['show','create', 'store','update','edit']]);
});