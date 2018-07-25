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

Route::match(['get', 'post'], '/botman', 'BotManController@handle');

Route::match(['get', 'post'], '/thc/send-my-question', 'THCController@sendMyQuestion');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::match(['get', 'post'], '/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('{path}', function () {
    return view('welcome');
})->where( 'path', '([A-z\d-\/_.]+)?' );