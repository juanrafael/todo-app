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

Route::prefix('/tareas')->name('tareas.')->group(function(){
    Route::get('/', 'TodoController@index')->name('index');
    Route::post('/', 'TodoController@store')->name('store');
    Route::patch('/{tarea}', 'TodoController@update')->name('update');
    Route::delete('/{tarea}', 'TodoController@destroy')->name('delete');
});