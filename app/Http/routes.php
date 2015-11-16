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
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', 'Greeting@greet');

Route::model('staff', 'App\Staff');
//Route::resource('staff', 'StaffController');
Route::group(array('middleware' => 'auth'), function()
{
  //Route::resource('user', 'UserController',
  //                ['only' => ['edit']]);
	Route::resource('staff', 'StaffController');
});
/*
Route::get('/staff', 'StaffController@index');
Route::get('/staff/{id}', [
    'as' => 'showStaff', 'uses' => 'StaffController@show'
]);*/

Route::get('/repairs', 'RepairsController@index');
Route::get('/repairs/{id}', [
    'as' => 'showRepair', 'uses' => 'RepairsController@show'
]);

Route::get('/cars', 'CarsController@index');
Route::get('/cars/{id}', [
    'as' => 'showCar', 'uses' => 'CarsController@show'
]);

Route::get('/clients', 'ClientsController@index');
Route::get('/clients/{id}', [
    'as' => 'showClient', 'uses' => 'ClientsController@show'
]);