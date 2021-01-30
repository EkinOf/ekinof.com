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

Route::get('/', 'PageController@home')->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/search', 'PageController@search')->name('search');

Route::get('/posts/{year}/{month}/{day}/{slug}', 'PostController@show')
    ->name('posts.show')
    ->where(['year' => '[0-9]+', 'month' => '[0-9]+', 'day' => '[0-9]+']);

Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show')
    ->where(['id' => '[\S]+']);
