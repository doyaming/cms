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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/about',function(){
    return view('about');
});

// Route::get('/posts/create','PostController@create');
// Route::get('/posts/edit','PostController@edit');
// Route::get('/posts/show','PostController@show');
// Route::get('/posts/index','PostController@index');

Route::get('/','PostController@index');

Route::resource('/posts','PostController');
Route::resource('/category','CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/trash', 'PostController@getAllTrash')->name('trash.index');
Route::get('/trash/{id}/restore', 'PostController@restoreTrash')->name('trash.restore');
Route::get('/trash/{id}', 'PostController@deleteTrash')->name('trash.delete');


