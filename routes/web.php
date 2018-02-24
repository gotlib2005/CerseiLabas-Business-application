<?php

Auth::routes();

Route::group( [ 'middleware' => [ 'auth' ] ], function () {

	Route::get( '/', 'HomeController@index' );
	Route::get( '/{url}', 'ServerController@index' )->where( 'url', '(allservers|home)' );

	Route::get( 'add-server', 'ServerController@create' );
	Route::post( 'add-server', 'ServerController@store' );

	Route::get( 'add-client', 'ClientController@create' );
	Route::post( 'add-client', 'ClientController@store' );

	Route::get( 'servers', 'ServerController@home' );
	Route::get( 'servers/{server}', 'ServerController@show' )->name( 'show_server' );
	Route::get( 'servers/{server}/edit', 'ServerController@editServer' )->name( 'edit_server' );
	Route::post( 'servers/{server}/edit', 'ServerController@update' );
	Route::get( 'servers/{server}/delete', 'ServerController@destroy' );

	Route::get( 'clients', 'ClientController@index')->name('allclient');;
	//Route::get( 'clients/{client}', 'ClientController@show' );
	Route::get( 'clients/{client}/edit', 'ClientController@edit' )->name('editclient');
	Route::post( 'clients/{client}/edit', 'ClientController@update' );
	Route::get( 'clients/{client}/delete', 'ClientController@destroy' );


	Route::get( '/logout', 'Auth\LoginController@logout' )->name( 'logout' );

	Route::get( 'projects', 'ProjectController@index' )->name( 'allprojects' );
	Route::get( 'projects/create', 'ProjectController@create' );
	Route::post( 'projects/create', 'ProjectController@store' );

	Route::get( 'projects/{project}/edit', 'ProjectController@edit' )->name( 'editproject' );
	Route::post( 'projects/{project}/edit', 'ProjectController@update' );
	Route::get( 'projects/{project}/delete', 'ProjectController@destroy' );

	Route::get('/search','AjaxController@search');

} );