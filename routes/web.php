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

Auth::routes();

Route::get('/', 'IndexController@index')->name('site.index');
Route::resource('/post', 'PostController@show')
    ->names('posts.show');
Route::put('/post/comment/{post}', 'CommentController@store')->name('comment.store');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/users', 'UserController')
        ->names('users');

    Route::resource('/categories', 'CategoryController')
        ->names('categories');

    Route::resource('/posts', 'PostController')
        ->names('posts');
});