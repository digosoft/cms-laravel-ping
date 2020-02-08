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
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('catagories', 'CatagoriesController')->middleware('auth');
Route::resource('post', 'PostController')->middleware('auth');

Route::get('trash-post', 'PostController@trashPost')->name('trash-post.index');

