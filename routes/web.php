<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index');

//api bol.com
Route::get('/api', 'API\LaptopsController@feed');
Route::get('/api/feed', 'API\LaptopsController@databasefeeder');
