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
Route::get('/contact', 'ContactController@index')->name('site.contact');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/categories', 'BlogCategoryController@index')->name('blog.category');
Route::get('/blog/category/{category}', 'BlogCategoryController@category')->name('blog.category.view');
Route::get('/post/{post}', 'BlogController@show')->name('blog.view');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')
        ->name('admin.home')->middleware('Admin');

    Route::resource('/users', 'UserController')
        ->names('admin.users')->middleware('User');

    Route::resource('/categories', 'CategoryController')
        ->names('admin.categories')->middleware('Admin');

    Route::resource('/posts', 'PostController')
        ->names('admin.posts')->middleware('Post');

    Route::get('/comments', 'CommentController@index')->name('admin.comments.index');
    Route::put('/comments/{post}', 'CommentController@store')->name('blog.comment.store');
    Route::get('/comments/{comment}/create', 'CommentController@create')->name('admin.comments.create');
    Route::get('/comments/{comment}/show', 'CommentController@show')->name('admin.comments.show')->middleware('User');
    Route::get('/comments/{comment}/edit', 'CommentController@edit')->name('admin.comments.edit')->middleware('User');
    Route::put('/comments/{comment}/update/', 'CommentController@update')->name('admin.comments.update')->middleware('User');
    Route::put('/comment/{comment}', 'CommentController@destroy')->name('admin.comments.destroy')->middleware('User');
    Route::delete('/comment/{comment}', 'CommentController@destroyBlog')->name('admin.comments.destroyBlog')->middleware('User');
});
