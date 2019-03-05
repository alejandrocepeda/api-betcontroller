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

//Route::group(['prefix' => 'v1'], function () {
Route::group(['middleware' => ['auth:api','permission']], function () {
	
	Route::post('register', 'Api\User\UserController@register')->name('register');

	Route::resource('events','Api\Event\EventController');
	Route::resource('leagues', 'Api\League\LeagueController');
	Route::resource('users', 'Api\User\UserController');
	//Route::resource('users.roles', 'Api\User\UserRoleController');

	Route::put('users/{user}/roles', 'Api\User\UserRoleController@syncRoles');
	

	Route::resource('roles', 'Api\Role\RoleController');
	Route::resource('sports', 'Api\Sport\SportController');
	Route::resource('locations', 'Api\Location\LocationController');
	Route::resource('bookmakers', 'Api\Bookmaker\BookmakerController');
	Route::resource('markets', 'Api\Market\MarketController');
	Route::resource('odds', 'Api\Odd\OddController');
	Route::resource('bets', 'Api\Bet\BetController');
	
});

