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

Route::get('/posts/search/{query}', function($query){
    return App\Post::search($query)->get();
});

Route::get('/detail/{post}', 'PostsController@show')->name("detail");
Route::get('posts/create', 'PostsController@create')->middleware('auth');
Route::get('posts/edit/{post}', 'PostsController@edit')->middleware('auth');
Route::post('posts/edit/{post}', 'PostsController@update')->middleware('auth');
Route::post('posts/{post}', 'PostsController@status')->middleware('auth')->name('status');
Route::post('/posts/{post}/comment', 'CommentsController@store');
Route::get('/delete-post/{post}', [
    'uses' => 'PostsController@delete',
    'as' => 'posts.delete',
    'middelware' => 'auth'
]);

Route::post('/posts', 'PostsController@store');

Route::post('liked/{post}', 'likedController@store')->middleware('auth');

// Profile route and avatar update controller
Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::post('/profile', 'UserController@update_avatar')->middleware('auth');
Route::get('/profile', 'UserController@index')->middleware('auth')->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');