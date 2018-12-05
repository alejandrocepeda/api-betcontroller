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

Route::post('login', 'Api\Passport\PassportController@login')->name('login');
Route::post('register', 'Api\User\UserController@register')->name('register');

Route::get('armanagement/{id}', 'Api\Sport\SportController@getGuzzleRequest');

Route::group(['middleware' => 'auth:api'], function(){
	
	Route::resource('events','Api\Event\EventController');
	Route::resource('users', 'Api\User\UserController');	
	Route::resource('sports', 'Api\Sport\SportController');
	Route::resource('countries', 'Api\Country\CountryController');
});

