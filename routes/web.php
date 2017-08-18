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

Route::get('/', 'AdsController@index')->name('home');
Route::get('ads/new', 'AdsController@new');
Route::post('ads/new', 'AdsController@create');
Route::post('/results', 'AdsController@filter');
Route::get('ads/{ad}', 'AdsController@show');

Route::get('/register', 'RegistrationController@show');
Route::post('/register', 'RegistrationController@create');

Route::get('/login', 'SessionsController@show')->name('login');
Route::post('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@logout');

Route::get('/dashboard', 'UserController@show')->name('dashboard');
Route::get('/{username}', 'UserController@profile')->where('profile', '[a-z]+');
