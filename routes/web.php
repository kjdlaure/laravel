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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/add', function () {
    return view('users.add');
});
Route::post('/user', ['as'=> 'user.store', 'uses' => 'UserController@store']);
Route::get('/user/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
Route::put('/user/{id}/update', ['as' => 'user.update', 'uses' => 'UserController@update']);
Route::delete('/user/{id}', ['as'=> 'user.destroy', 'uses' => 'UserController@destroy']);