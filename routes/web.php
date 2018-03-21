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

Route::get('/', function () {    return view('welcome'); });
Route::post('/basic-info/abc/{id?}',   'Institute\InstituteController@updateBasicInfo');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/institute-register','Institute\InstituteController@getRegistrationForm');
Route::post('/institute-register','Institute\InstituteController@postRegistrationForm');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
	Route::get('/{id?}','UserDashboardController@index');
	Route::get('/institute-basic-info/edit-page','Institute\InstituteController@getBasicInfoEditPage');
	Route::get('/institute-address/edit-page','Institute\InstituteController@getAddressEditPage');

	
});

Route::prefix('institute')->group(function () {
	Route::post('/basic-info/{id?}',   'Institute\InstituteController@updateBasicInfo');	
	Route::post('/address/{id?}', 'InstituteController@getCity');
    
});

Route::get('/home', 'HomeController@index');
