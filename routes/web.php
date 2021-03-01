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

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('/posts', 'App\Http\Controllers\PostController');
    }
);

Route::get('/image/{post}', [App\Http\Controllers\PostController::class, 'getImage'])->name('image');
