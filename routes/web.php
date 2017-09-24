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

Route::get('/', 'PostsController@index');

Route::get('/posts_detail/{post}', 'PostsController@show');

Route::get('posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

// Profile route and avatar update controller
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
