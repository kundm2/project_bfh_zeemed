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


Auth::routes(['register' => false]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/', 'DashboardController@toRoot');

Route::get('/patients', 'PatientController@index');
Route::get('/patient', 'PatientController@toIndex');
Route::get('/patient/add', 'PatientController@displayAdd');
Route::post('/patient/add', 'PatientController@addNew');
Route::post('/patient/addMedicine/{id}', 'PatientController@addMedicine');
Route::post('/patient/addVital/{id}', 'PatientController@addVital');
Route::get('/patient/edit/{id}', 'PatientController@displayEdit');
Route::post('/patient/edit/{id}', 'PatientController@save');
Route::get('/patient/del/{id}', 'PatientController@patientDel');
Route::get('/patient/{id}', 'PatientController@displayView');

Route::get('/users', 'UserController@index');
Route::get('/user', 'UserController@toIndex');
Route::get('/user/add', 'UserController@displayAdd');
Route::post('/user/add', 'UserController@addNew');
Route::get('/user/{id}', 'UserController@displayView');

Route::get('/profile', 'UserController@profile');

Route::get('/search', ['as' => 'search', 'uses' => 'OptionController@search']);
Route::get('/options', 'OptionController@index');
Route::post('/options/funciton/add', 'OptionController@functionAdd');
Route::get('/options/function/del/{id}', 'OptionController@functionDel');
Route::post('/options/medicament/add', 'OptionController@medicamentAdd');
Route::get('/options/medicament/del/{id}', 'OptionController@medicamentDel');

Route::get('/home', 'HomeController@index')->name('home');
