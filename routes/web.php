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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['checkGuest']],function (){
    Route::post('/login',['as' => 'login', 'uses' => 'Auth\LoginController@login']);
    Route::post('/register',['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
    Route::get('/client-login',['as' => 'client.login','uses' => 'Auth\LoginController@index']);
});
Route::post('/logout',['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
