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
	Route::put('/basic-info/{id?}', 'Institute\InstituteController@updateBasicInfo');	
	Route::put('/address/{id?}', 'Institute\InstituteController@updateAddress');	
    
});
// teacher url
Route::prefix('user')->group(function () {
   Route::group(['namespace' => 'User'], function () {
	Route::match(['get', 'post'],'/register', 'UserController@register');
	Route::match(['get', 'post'],'/user-education', 'UserEducationController@index');
	Route::match(['put','delete'],'/user-education/{$id}', 'UserEducationController@userEducation');
	Route::match(['get', 'post'],'/user-experience', 'UserExperienceController@index');
	Route::match(['put','delete'],'/user-experience/{$id}', 'UserExperienceController@userExperience');
  }); 
});
Route::get('/home', 'HomeController@index');






Route::prefix('admin')->group(function () {
    //Route::group(['namespace' => 'Admin'], function () {

        Route::prefix('institute')->group(function () {
               Route::group(['namespace' => 'Institute'], function () {
                     //Route::match(['post','put','delete'],'/education-degree', 'EducationDegreeController@index');	
              }); 
            });

            Route::prefix('teacher')->group(function () {
               Route::group(['namespace' => 'User'], function () {
                     Route::match(['get','post','put','delete'],'/education-degree/{id?}', 'EducationDegreeController@index');
                     Route::match(['get','post','put','delete'],'/college-type/{id?}', 'CollegeTypeController@index');
                     Route::match(['get','post','put','delete'],'/college/{id?}', 'CollegeController@index');
              }); 
            });
            
            Route::prefix('location')->group(function () {
               Route::group(['namespace' => 'Location'], function () {
                     Route::match(['get','post','put','delete'],'/state/{id?}', 'StateController@index');
                     Route::match(['get','post','put','delete'],'/city/{id?}', 'CityController@index');

                    
              }); 
            });
    //});
});