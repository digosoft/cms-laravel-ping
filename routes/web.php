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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('catagories', 'CatagoriesController') ;
	Route::resource('tags', 'TagsController') ;
	Route::resource('post', 'PostController');
	Route::get('trash-post', 'PostController@trashPost')->name('trash-post.index');
	Route::put('restore-post/{post}', 'PostController@restorePost')->name('restore.post');
	
});


Route::middleware(['auth', 'admin'])->group(function(){
	Route::get('user/profile', 'UsersController@edit')->name('user.edit-profile');
	Route::put('user/profile', 'UsersController@update')->name('user.update-profile');
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});

 

