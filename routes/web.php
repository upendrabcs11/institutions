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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/dashboard/{id?}','DashboardController@index');
Route::get('/institute-register','Institute\InstituteController@getRegistrationForm');
Route::post('/institute-register','Institute\InstituteController@postRegistrationForm');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
