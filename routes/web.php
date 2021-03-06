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
    return view('auth.login');
});


Auth::routes();


Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/add', function () {
    return view('users.add');
});
Route::post('/user', ['as'=> 'user.store', 'uses' => 'UserController@store']);
Route::get('/user/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
Route::get('/user/{id}/edit',  ['as' => 'user.edit', 'uses' => 'UserController@edit']);
Route::post('/user/{id}/update', ['as' => 'user.update', 'uses' => 'UserController@update']);
Route::delete('/user/{id}', ['as'=> 'user.destroy', 'uses' => 'UserController@destroy']);
Route::delete('/userDeleteMultiple', ['as'=> 'user.deleteMultiple', 'uses' => 'UserController@deleteMultiple']);