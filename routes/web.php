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

/* FORMS */

Route::get('/', ['as' => 'index', 'uses' => 'FrontController@index']);
Route::get('/home', ['as' => 'home', 'uses' => 'FrontController@index']);

/* ADMIN */

Auth::routes();

Route::get('logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'AdminController@index'])->middleware('auth');
    Route::post('update', ['as' => 'lead_update', 'uses' => 'AdminController@update'])->middleware('auth');
    Route::get('show/{id}', ['as' => 'lead_edit', 'uses' => 'AdminController@show'])->middleware('auth');
    Route::get('edit/{id}', ['as' => 'lead_edit', 'uses' => 'AdminController@edit'])->middleware('auth');
    Route::get('send/{id}', ['as' => 'lead_edit', 'uses' => 'AdminController@send'])->middleware('auth');
    Route::get('destroy/{id}', ['as' => 'lead_destroy', 'uses' => 'AdminController@destroy'])->middleware('auth');
});

Route::get('register', ['as' => 'register', 'uses' => 'FrontController@index']);