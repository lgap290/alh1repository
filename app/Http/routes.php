<?php 

use App\User;
use App\BotellaLicor;

Route::group(['middleware' => 'auth'], function () {

    Route::resource('productos', 'BotellasLicorController',
                ['except' => ['show']]);

});

Route::get('/', function () {
    if(Auth::guest())
    	return view('auth.login');
    else
    	return view('inicio');
});

Route::get('/inicio', 'HomeController@index');
Route::get('ingresar', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('ingresar', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::auth();

Route::get('/productos/{id}', 'BotellasLicorController@show');

Route::resource('tapa', 'TapaBotellasLicor',
	['only' => ['update']]);