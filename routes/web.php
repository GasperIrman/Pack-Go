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
Route::resource('reviews', 'MotorhomeReviewController'); 


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'PageController@index' );
Route::get('/about', 'PageController@about' );
Route::post('/checkPassword', 'UserController@passCheck')->name('check');
Route::post('/storePassword', 'UserController@passStore');

//Za email verification
Auth::routes(['verify' => true]);

//za rent da dobis motorhome id
Route::get('/rents/create/{id}', 'RentController@create');

//za reviwe
Route::get('/reviews/create/{id}', 'MotorhomeReviewController@create');

Route::get('/provider/{id}', 'UserController@provider');

Route::get('motorhomes/{id}', ['as' => 'motorhome.show', 'uses' => 'MotorhomeController@show']);

Route::post('/search', 'MotorhomeController@search');
Route::post('/filter', 'MotorhomeController@filter');

//Live search
Route::get('/liveModel/{Query}', 'RVModelController@live');
Route::get('/liveCountry/{Query}', 'CountryController@live');
Route::get('/liveCity/{Query}', 'CityController@live');


//Multiple file upload
Route::post('/images', 'PhotoController@uploadSubmit');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//API
Route::get('/api/motorhomes', 'MotorhomeController@Motorhomes');
Route::get('/api/motorhomes/{id}', 'MotorhomeController@Motorhome');
Route::post('/api/motorhomes', 'MotorhomeController@MotorhomesFilter');
Route::post('/api/motorhome', 'MotorhomeController@apicreate');
Route::get('/api/users', 'UserController@Users');
Route::get('/api/users/{id}', 'UserController@User');
Route::post('/api/login', 'UserController@APIlogin');
Route::post('/api/register', 'UserController@APIregister');
Route::post('/api/rent', 'RentController@Rent');
Route::get('/api/models', 'RVModelController@Models');


