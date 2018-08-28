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

//aanbiedingen hoofdpagina
Route::get('/', 'SpecialOffersController@index')->name('home');

//login en registreerfuncties
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index');

//api bol.com
Route::get('/api/laptops', 'API\LaptopsController@feed');

//zoekfunctie
Route::post('/search', 'Search\SearchController@index')->name('search.index');

// producten laptops
Route::get('/laptops', 'ProductCategorien\LaptopsController@index')->name('laptops.index');
Route::post('/laptops', 'ProductCategorien\LaptopSearchController@search')->name('laptops.index');
Route::get('/laptops/{laptop}', 'ProductCategorien\LaptopsController@show')->name('laptops.show');

// producten desktops
Route::get('/desktops', 'ProductCategorien\DesktopsController@index')->name('desktops.index');
Route::post('/desktops', 'ProductCategorien\DesktopSearchController@search')->name('desktops.index');
Route::get('/desktops/{desktop}', 'ProductCategorien\DesktopsController@show')->name('desktops.show');

// producten monitors
Route::get('/monitors', 'ProductCategorien\MonitorsController@index')->name('monitors.index');
Route::post('/monitors', 'ProductCategorien\MonitorSearchController@search')->name('monitors.index');
Route::get('/monitors/{monitor}', 'ProductCategorien\MonitorsController@show')->name('monitors.show');

//reviews
Route::post('/laptops/reviews/store/{id}', 'Reviews\LaptopReviewsController@store')->name('laptops.review.store');

//cart
Route::get('/cart/add/{ean}', 'CartController@addToCart')->name('addToCart');
Route::get('/cart/delete/{id}', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/update', 'CartController@update')->name('cart.update');
Route::get('/cart', 'CartController@index')->name('cart.index');

//order en betaling
Route::get('/order', 'OrderController@index')->name('order.index')->middleware('auth');
Route::get('/order/betaling', 'PaymentsController@preparePayment')->name('prepare.payment');
//Route::post('/webhooks/mollie', 'PaymentsController@handle')->name('payment.webhook');

Route::post('/webhooks/mollie', 'PaymentsController@handle');

Route::get('/order/betaling/success', 'PaymentsController@success')->name('payment.success');

//account
Route::get('/account', 'Account\AccountController@index')->name('account.index');
Route::get('/account/persoonlijke-gegevens/mailer', 'Account\AccountController@newBevestigingsMail')->name('account.adres.mailer');
Route::get('/account/persoonlijke-gegevens', 'Account\AccountController@adres')->name('account.adres.show');
Route::post('/account/persoonlijke-gegevens', 'Account\AccountController@adresstore')->name('account.adres.store');

Route::get('/account/inlog-gegevens', 'Account\AccountController@inlog')->name('account.inlog.show');
Route::post('/account/inlog-gegevens/{user}', 'Account\AccountController@inlogstore')->name('account.inlog.store');


