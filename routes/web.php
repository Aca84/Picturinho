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

// Route::get('/posts', function () {
//     return view('posts.index');
// });

Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::resource('posts', 'App\Http\Controllers\PostsController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\PostsController::class, 'search'])->name('search');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
