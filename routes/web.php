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



Route::resource('motorhomes', 'MotorhomeController'); 
Route::resource('rents', 'RentController'); 
Route::resource('rvmodels', 'RVModelController'); 
Route::resource('users', 'UserController')->middleware('verified');; 
Route::resource('cities', 'CityController'); 
Route::resource('brands', 'BrandController'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PageController@index' );
Route::get('/about', 'PageController@about' );
Route::post('/checkPassword', 'UserController@passCheck')->name('check');
Route::post('/storePassword', 'UserController@passStore');

//Za email verification
Auth::routes(['verify' => true]);

//za rent da dobis motorhome id
Route::get('/rents/create/{id}', 'RentController@create');