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

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('admin/post/index', 'HomeController@postIndex')->name('admin.post.index');
Route::get('admin/post/{id}/accept', 'HomeController@postAccept')->name('admin.post.accept');
Route::get('admin/post/{id}/show', 'HomeController@postShow')->name('admin.post.show');
Route::get('admin/post/create', 'HomeController@postCreate')->name('admin.post.create');
Route::post('admin/post/store', 'HomeController@postStore')->name('admin.post.store');
