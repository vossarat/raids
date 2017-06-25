<?php

/*Route::get('/', function () {
return view('welcome');
});*/

/*Route::get('/', function () {
return view('layouts.template');
});*/

Route::resource('/','IndexController');

Route::get('/filter', 'IndexController@index')->name('filter');

Route::prefix('setup')->group(
	function ()
	{
		Route::get('/', 'SetupController@index')->name('setup');
		Route::post('/append', 'SetupController@appendTable')->name('append');
		Route::post('/make/register', 'SetupController@makeTableRegister');
		Route::post('/make/reference', 'ReferenceController@index');
	});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
