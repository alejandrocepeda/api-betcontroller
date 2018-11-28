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



Route::get('/login', function () {
    return view('welcome');
});

//Route::post('/login', 'Api\Passport\PassportController@login')->name('login');
**Route::post('/register', 'Api\User\UserController@register')->name('register');


Route::get('/guzzle', 'Api\Sport\SportController@getGuzzleRequest');

Route::group(['middleware' => 'auth:api'], function(){
	Route::resource('events','Api\Event\EventController');
	Route::resource('/users', 'Api\User\UserController');	
	Route::resource('/sports', 'Api\Sport\SportController');
	Route::resource('/countries', 'Api\Country\CountryController');
});


