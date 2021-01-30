<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('posts', 'Api\PostController')->only('index');

Route::resource('categories', 'Api\CategoryController')->only('index');

Route::get('twitter/feed', 'Api\TwitterController@feed')->name('twitter.feed');
