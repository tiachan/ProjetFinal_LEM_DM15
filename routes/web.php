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

use App\Mail\ContactMessageCreated;

Route::get('/test-email', function() {
	return new ContactMessageCreated('test@testing.com', 'test description');
});

Route::get('/', 'FrontController@index')-> name('index');

Route::get('/search', 'FrontController@showResearch')->name('search');


Route::get('/post/{id}', 'FrontController@show')->where(['id'=>'[0-9]+']);

Route::get('/post/{post_type}', 'PostTypeController@show')->where(['post_type'=>'formation|stage']);

Route::get('/contact', 'ContactController@contact')->name('contact');

Route::post('/contact', 'ContactController@store');


// Route::get('/posts', function () {
//     return App\Post::all();
// });

// Route::get('/post/{id}', function ($id) {
//     return App\Post::find($id);
// });

// Route::get('/post/{post_types}', function (string $post_types) {
//     return App\Post::find($post_types);
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/post', 'PostController')->middleware('auth');
