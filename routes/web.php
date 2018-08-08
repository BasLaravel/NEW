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
Route::get('/api/laptops', 'API\LaptopsController@feed');

// producten laptops
Route::get('/laptops', 'ProductCategorien\LaptopsController@index')->name('laptops.index');
Route::get('/laptops/{laptop}', 'ProductCategorien\LaptopsController@show')->name('laptops.show');
Route::post('/laptops/search', 'ProductCategorien\LaptopSearchController@searchByBrand');

