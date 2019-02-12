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
    return view('index');
});

Route::resource('motorhomes', 'MotorhomeController'); 
Route::resource('rents', 'RentController'); 
Route::resource('rvmodels', 'RVModelController'); 
Route::resource('users', 'UserController'); 
Route::resource('cities', 'CityController'); 
Route::resource('brands', 'BrandController'); 




