<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'Web'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'AppController@getApp');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', 'AppController@getLogin')->name('login');
    });

    Route::group(['namespace' => 'Auth'], function () {
        Route::group(['middleware' => ['guest']], function () {
            Route::get('/auth/{social}', 'AuthenticationController@getSocialRedirect');
            Route::get('/auth/{social}/callback', 'AuthenticationController@getSocialCallback');
        });
    });
});
