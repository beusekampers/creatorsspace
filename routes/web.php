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

Route::get('/category/{id}', 'PostsController@index')->name("category");

Route::get('/posts_detail/{post}', 'PostsController@show');
Route::get('posts/create', 'PostsController@create')->middleware('auth');
Route::get('posts/edit/{post}', 'PostsController@edit')->middleware('auth');
Route::post('posts/edit/{post}', 'PostsController@update')->middleware('auth');
Route::post('posts/{post}', 'PostsController@status')->middleware('auth');

Route::get('/delete-post/{post}', [
    'uses' => 'PostsController@delete',
    'as' => 'posts.delete',
    'middelware' => 'auth'
]);

Route::post('/posts', 'PostsController@store');

// Profile route and avatar update controller
Route::get('profile', 'UserController@profile')->middleware('auth');
Route::post('profile', 'UserController@update_avatar')->middleware('auth');
Route::get('profile', 'UserController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');