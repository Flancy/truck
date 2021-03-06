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

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');


//Pages
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/call', 'PagesController@call')->name('call');
Route::get('/review', 'PagesController@review')->name('review');

//User
Route::resource('user', 'UserController');

//Dashboard
Route::get('/setting', 'DashboardController@settingShow')->name('setting');
Route::post('/auto', 'DashboardController@settingSaveAuto')->name('saveAuto');
//Info
Route::get('/info', 'Dashboard\InfoController@index')->name('info');
Route::post('/info', 'Dashboard\InfoController@create')->name('info.create');

//Search
Route::get('/search', 'SearchController@index')->name('search');

//Reviews
Route::post('/reviews', 'ReviewsController@store')->name('reviews');

//Orders
Route::post('/order', 'OrdersController@store')->name('order');
Route::delete('/order', 'OrdersController@destroyOrder')->name('order.destroy');
Route::get('/order/{id}', 'OrdersController@showOrder')->name('order.show');
Route::post('/orderChange', 'OrdersController@changeStatus')->name('orderChange.changeStatus');
Route::get('/orderChange/{id}/{status}', 'OrdersController@changeStatusComplete')->name('orderChange.changeStatusComplete');

//Admin
Route::middleware(['admin'])->group(function () {
	Route::resource('admin', 'Admin\AdminController');
});