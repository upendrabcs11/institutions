<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['namespace' => 'API'], function () {
	Route::group(['namespace' => 'location'], function () {
	    Route::get('/city/{stateId?}', 'LocationController@getCity');
	    Route::get('/area/{cityId?}', 'LocationController@getArea');
	    Route::get('/state/{stateId?}', 'LocationController@getState');

	    Route::post('/city', 'LocationController@postCity');
	    Route::post('/area', 'LocationController@postArea');
	    Route::post('/state', 'LocationController@postState');
	});
});
