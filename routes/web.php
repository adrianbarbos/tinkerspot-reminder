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
    return redirect('/tasks');
});


Route::get('/tasks', 'TaskController@index')->name('tasks');

Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/tasks/create', 'TaskController@store')->name('tasks.store');

Route::get('/tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
Route::post('/tasks/{task}/edit', 'TaskController@update')->name('tasks.update');

Route::get('/tasks/{task}/toggle', 'TaskController@toggle')->name('tasks.toggle');

Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.delete');