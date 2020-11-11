<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('layouts.default');
});

// Web Routes for Post
Route::get('/postlist', function () {
    return view('posts.index');
})->name('post-list');
Route::get('/post/create', function () {
    return view('posts.create');
})->name('post-create');
Route::get('/post/edit', function () {
    return view('posts.edit');
})->name('post-edit');
Route::get('/post/confirm-post', function () {
    return view('posts.confirm-post');
})->name('confirm-post');
Route::get('/post/upload-post', function () {
    return view('posts.upload-post');
})->name('upload-post');
Route::get('/change-password', function () {
    return view('posts.change-password');
})->name('change-password');

// Web Routes for User
Route::get('/userlist', function () {
    return view('users.index');
})->name('user-list');

Route::get('/user/edit', function () {
    return view('users.edit');
})->name('user-edit');
Route::get('/user/confirmuser', function () {
    return view('users.confirm-user');
})->name('confirm-user');

// Web Routes for Profile
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile');
Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile-edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
