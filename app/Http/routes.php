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

Route::get('/greeting', 'Greeting@greet');

Route::resource('staff', 'StaffController');
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