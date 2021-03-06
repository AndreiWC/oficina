<?php


Route::get('/', 'SiteController@index');
Route::get('/home', 'SiteController@index');
Route::get('/noticias', 'SiteController@noticias');
Route::get('/eventos', 'SiteController@eventos');
Route::get('/about', 'SiteController@about');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/', 'UsuariosController@index');
        Route::get('create', 'UsuariosController@create');
        Route::post('create', 'UsuariosController@create2');
        Route::get('update', 'UsuariosController@update');
        Route::post('update', 'UsuariosController@update2');
        Route::get('destroy', 'UsuariosController@destroy');
    });

});