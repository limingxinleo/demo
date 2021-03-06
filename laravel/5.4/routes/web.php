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

Route::get('/index/hello', "IndexController@hello");
Route::get('/index/sql', "IndexController@sql");
Route::get('/index/timer', "IndexController@timer");
Route::get('/index/params/{id}/{name}', "IndexController@params");
Route::get('/index/call/test', "IndexController@calltest");
