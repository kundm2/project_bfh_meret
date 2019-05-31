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

Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@toIndex');

Route::get('/institutes/data', 'InstituteController@returnData');
Route::get('/institutes', 'InstituteController@index');

Route::get('/services/overview', 'ServiceController@overview');
Route::get('/services/add', 'ServiceController@new');
Route::post('/services/add', 'ServiceController@addNew');
Route::get('/services', 'ServiceController@index');

Route::get('/events', 'EventController@index');

Route::get('/profile', 'ProfileController@index');

Route::get('/zarit/new', 'ZARITController@new');
Route::post('/zarit/new', 'ZARITController@addNew');
Route::get('/zarit', 'ZARITController@index');



Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
