<?php

/*Route::get('/', function () {
return view('welcome');
});*/

/*Route::get('/', function () {
return view('layouts.template');
});*/

// Auth Routes...
/*Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/
// End Auth Routes...

Auth::routes();

Route::group(['middleware'=>'auth'],
    function()
    {
        Route::get('/','IndexController@index');

        Route::resource('index','IndexController');

        Route::resource('region','RegionController');

        Route::resource('code','CodeController');

//        Route::post('excel','ExcelController@index')->name('excel');

        Route::prefix('reports')->group(
            function ()
            {
                Route::any('/form4', 'Reports\Form4Controller@getForm4');
            });

        Route::prefix('setup')->group(
            function ()
            {
                Route::get('/', 'SetupController@index')->name('setup');
                Route::post('/append', 'SetupController@appendTable')->name('append');
                Route::post('/make/register', 'SetupController@makeTableRegister');
                Route::post('/make/reference', 'SetupController@makeReferences');
            });

    });