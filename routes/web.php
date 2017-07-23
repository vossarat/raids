<?php

/*Route::get('/', function () {
return view('welcome');
});*/

/*Route::get('/', function () {
return view('layouts.template');
});*/

Route::get('/','IndexController@index');

Route::resource('index','IndexController');

Route::resource('region','RegionController');

Route::resource('code','CodeController');

Route::post('excel','ExcelController@index')->name('excel');

Route::prefix('reports')->group(
	function ()
	{
		Route::any('/form4', 'ReportsController@form4');
	});
	
Route::prefix('setup')->group(
	function ()
	{
		Route::get('/', 'SetupController@index')->name('setup');
		Route::post('/append', 'SetupController@appendTable')->name('append');
		Route::post('/make/register', 'SetupController@makeTableRegister');
		Route::post('/make/reference', 'SetupController@makeReferences');
	});


//Auth::routes();
