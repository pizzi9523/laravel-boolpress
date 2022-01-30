<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('guest.welcome');
})->name('welcome');

Route::resource('products', 'ProductController')->only(['index', 'show']);
Route::resource('posts', 'PostController')->only(['index', 'show']);
Route::get('categories/{category}/posts', 'CategoryController@posts')->name('categories.posts');
Route::get('tags/{tag}/posts', 'TagController@posts')->name('tags.posts');



Auth::routes(['register => false']);

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('products', 'ProductController');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
});