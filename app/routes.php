<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as'=>'home', 'uses'=>'SessionsController@create'] );

Route::get('abel', function(){

	$abel = User::find(3);

	return $abel->docs->lists('docname');

});
/*  Users  */
Route::get('/dashboard',['before'=>'admin', 'uses'=>'UsersController@dashboard']);
Route::get('/user/{id}',['as'=>'user', 'uses'=>'UsersController@user']);
Route::resource('users', 'UsersController');

/* documents  */
Route::post('/docs/send/{id}',['as'=>'docs.send', 'uses'=>'DocsController@send']);
Route::get('/docs/compose/{id}',['as'=>'docs.compose', 'uses'=>'DocsController@compose']);
Route::resource('docs', 'DocsController');

/* Messages */ 
Route::resource('posts', 'PostsController');
/*  Sessions */
Route::get('/logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');


