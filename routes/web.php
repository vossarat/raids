<?php

/*Route::get('/', function () {
return view('welcome');
});*/

/*Route::get('/', function () {
	$file = file_get_contents( asset('dump/code.sql') ); 
	dd($file);
});*/

Route::prefix('setup')->group(
            function ()
            {
                Route::get('/', 'SetupController@index')->name('setup');
                Route::post('/append', 'SetupController@appendTable')->name('append');
                Route::post('/make/table', 'SetupController@makeTable');
            });
            
Route::prefix('settings')->group(
            function ()
            {
                Route::get('/', 'SettingsController@index')->name('settings');
                Route::post('/period', 'SettingsController@setPeriod')->name('period');
                Route::post('/closedate', 'SettingsController@closeDate')->name('closedate');
            });

Route::prefix('tube')->group(
            function ()
            {
                Route::get('/', 'TubeController@index')->name('tube');
                Route::post('/add', 'TubeController@add')->name('addtube');
               
            });

Auth::routes();

Route::group(['middleware'=>'auth'],
    function()
    {
        Route::get('/','IndexController@index');

        Route::resource('index','IndexController');

        Route::resource('region','RegionController');

        Route::resource('code','CodeController');
        
        

        Route::prefix('reports')->group(
            function ()
            {
                Route::any('/form4bygender', 'Reports\Form4Controller@getForm4ByGender'); //форма4 по полу
                Route::any('/form4bycomparison', 'Reports\Form4Controller@getForm4ByComparison'); //форма 4 в сравнении с прошлым периодом
                Route::any('/countbyregion', 'Reports\CountByRegionController@getForm'); //count по ЛПУ
                Route::any('/list', 'Reports\FilterListController@getForm'); //список
            });
    });
