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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/mi_primer_ruta', function(){
    return view('engines.index');
});

Route::get('/algoritmo', function(){
    return view('calendar.algoritmo');
});

Route::get('/name/{name}', function($name){
    return 'Hello World '.$name;
});

Route::get('/agenda', function(){
    return view('calendar.index');
});
Route::get('vehicles/getByMonth', 'VehicleController@getValidationMonths');
Route::resource('users', 'UserController');
Route::resource('customers', 'CompanyController');
Route::resource('services', 'ServiceController');
Route::resource('axes', 'AxesController');
Route::resource('engines', 'EngineController');
Route::resource('roles', 'RoleController');
Route::resource('tests', 'TestsController');
Route::resource('rejects', 'RejectionController');
Route::resource('verify', 'VerificationController');

Route::resource('vehicles', 'VehicleController');
Route::get('showVehicles/{id}', 'VehicleController@showVehicles');
Route::get('addVehicle/{id}', 'VehicleController@addVehicle');

Route::get('fisico', 'fisicoReportController@mensual');
Route::get('emissions', 'EmissionReportController@mensual');
Route::get('algorithm', 'pruebaController@algorithm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
