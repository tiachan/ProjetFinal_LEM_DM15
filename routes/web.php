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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index');

Route::get('/post/{id}', 'FrontController@show')->where(['id'=>'[0-9]+']);

Route::get('/post/{post_types}', 'PostTypeController@show')->where(['post_types'=>'[a-z]+']);

// Route::get('/posts', function () {
//     return App\Post::all();
// });

// Route::get('/post/{id}', function ($id) {
//     return App\Post::find($id);
// });

// Route::get('/post/{post_types}', function (string $post_types) {
//     return App\Post::find($post_types);
// });