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

Route::resource('user', 'UserController');
Route::resource('book', 'BookController');
Route::resource('lend', 'LendController');
Route::group(['prefix' => 'lend'], function () {
	Route::get('devolution/{lend}', ['uses' => 'LendController@devolution'])->name('lend.devolution');
	Route::post('devolution/{lend}', ['uses' => 'LendController@devolution_post'])->name('lend.devolution_post');
});
