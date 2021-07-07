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

//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/create', 'HomeController@create')->name('users.create');
Route::post('user/store', 'HomeController@store')->name('users.store');
Route::get('/user/{user}/edit', 'HomeController@edit')->name('users.edit');
Route::patch('/user/{user}/update', 'HomeController@update')->name('users.update');
Route::delete('/user/{user}/delete', 'HomeController@destroy')->name('users.destroy');
