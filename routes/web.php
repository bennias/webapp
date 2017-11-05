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

/*Route::get('/home', 'HomeController@index')->name('home');*/

// Route::get('/', 'TasksController@index');

// Auth::routes();
Route::get('/tasks', 'TasksController@index');

Route::get('/task','TasksController@add');
Route::post('/task','TasksController@create');

Route::get('/task/{task}','TasksController@edit');
Route::post('/task/{task}','TasksController@update');


Route::get('/home',[
    'uses' => 'PostController@getDashboard',
    'as' => 'home',
    'middleware' => 'auth'
]);

Route::post('/createpost',[
   'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);
Route::get('/delete-post/{post_id}',[
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);
Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);