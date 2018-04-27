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
	Route::group(['namespace' => 'Location'], function () {
	    Route::match(['get', 'post'],'/state', 'LocationController@state');
	    Route::match(['get', 'post'],'/city', 'LocationController@city');
	    Route::match(['get', 'post'],'/area', 'LocationController@area');

	    Route::get('/state/{id?}', 'LocationController@getStateById');
	    Route::get('/city/{id?}', 'LocationController@getCityById');
	    Route::get('/area/{id?}', 'LocationController@getAreaById');
	});
	Route::group(['namespace' => 'User'], function () {
	    Route::get('/user/user-type', 'CommonController@getUserType');
	    Route::get('/user/education-degree', 'CommonController@getEducationDegree');
	    Route::get('/user/education-department', 'CommonController@getEducationDepartment');
	    Route::get('/user/education-stage', 'CommonController@getEducationStage');
	    Route::get('/user/teacher-title', 'CommonController@getTeacherTitle');
	    Route::get('/college-type', 'CommonController@getCollegeType');
	    Route::get('/college', 'CommonController@getCollege');
	});

	
});


