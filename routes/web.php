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

//    $works = DB::table('work_from_users')->get();
    $works = App\WorkFromUser::all();

    return view('welcome', compact('works'));
});


Route::get('/work_detail/{id}', function($id){

//    $works = DB::table('work_from_users')->find($id);
    $works = App\WorkFromUser::find($id);
    return view('works_detail.show', compact('works'));

});