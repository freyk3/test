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

Route::get('/', 'HomeController@index');
Route::get('/item/{id}', 'HomeController@item');
Route::any('/item/{id}/newComment', 'HomeController@newComment');
Route::any('/item/{id}/getComments', 'HomeController@getComments');

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{

    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('/admin/item/{id}', 'AdminController@item');
    Route::post('/admin/update/{id}', 'AdminController@update');
    Route::get('/admin/create', 'AdminController@createpage');
    Route::post('/admin/create', 'AdminController@create');
    Route::any('/admin/delete/{id}', 'AdminController@delete');
    Route::any('/admin/deleteComment/{id}', 'AdminController@deleteComment');

});

