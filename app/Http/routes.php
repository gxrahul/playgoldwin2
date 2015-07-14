<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/result', 'HomeController@showresult');
Route::get('/result/{date}', 'HomeController@showresult');

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('/admin', function() {
	return redirect("admin/lotteries/winning");
});

Route::group([ 'prefix' => '/admin/settings', 'middleware' => ['auth']], function() {
	Route::get('/', 'UserController@settings');
	Route::post('/', 'UserController@save_settings');
});

Route::group(['prefix' => 'admin/lotteries', 'middleware' => ['auth']], function() {

	Route::get('winning', 'LotteriesController@index_winning');
	Route::post('winning', 'LotteriesController@store_winning');
	Route::get('winning/{lottery_id}', 'LotteriesController@show_winning');
	Route::post('winning/{lottery_id}', 'LotteriesController@store_winning');

	Route::get('manage', 'LotteriesController@show_lotteries');
	Route::get('manage/delete/{lottery_id}', 'LotteriesController@destroy_lottery');
	Route::post('manage', 'LotteriesController@store_lotteries');
	Route::post('manage/{lottery_id}', 'LotteriesController@update_lottery');
	Route::delete('manage/{lottery_id}', 'LotteriesController@destroy_lottery');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
