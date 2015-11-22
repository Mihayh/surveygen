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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/login', ['as' => 'login.post', 'uses' => 'Auth\AuthController@authenticate']);


Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['middleware' => 'jwt.auth'], function(){
	Route::resource('categories', 'CategoriesController');
	Route::resource('categories.surveys', 'SurveysController');
});