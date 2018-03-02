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
    return view('entites.create');
});

// Route::resource('entites', 'EntiteController');
// Route::resource('users', 'UserController');

Route::get('entites', 'EntiteController@index')->name('entites.index');
Route::get('entites/create', 'EntiteController@create')->name('entites.create');
Route::post('entites/store', 'EntiteController@store')->name('entites.store');
Route::get('entites/{id}', 'EntiteController@show')->name('entites.show');
Route::get('entites/{id}/edit', 'EntiteController@edit')->name('entites.edit');
Route::put('entites/{id}', 'EntiteController@update')->name('entites.update');
Route::delete('entites/{id}', 'EntiteController@destroy')->name('entites.destroy');

Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::post('users/store', 'UserController@store')->name('users.store');
Route::get('users/{id}', 'UserController@show')->name('users.show');
Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{id}', 'UserController@update')->name('users.update');
Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
