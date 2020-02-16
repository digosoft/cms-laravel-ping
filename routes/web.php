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

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('catagories', 'CatagoriesController') ;
	Route::resource('post', 'PostController');
	Route::get('trash-post', 'PostController@trashPost')->name('trash-post.index');
	Route::put('restore-post/{post}', 'PostController@restorePost')->name('restore.post');
	
});


