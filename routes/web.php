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

Route::get('/', function () {
    return view('layouts.default');
});

// Web Routes for Post
Route::get('/postlist', function () {return view('posts.index');})->name('postlist');
Route::get('/post/create', function () {return view('posts.create');})->name('postcreate');
Route::get('/post/edit', function () {return view('posts.edit');})->name('postedit');
Route::get('/post/confirmpost', function () {return view('posts.confirm-post');})->name('confirm-post');
Route::get('/post/uploadpost', function () {return view('posts.upload-post');})->name('upload-post');
Route::get('/changepassword', function () {return view('posts.change-password');})->name('change-password');

// Web Routes for User
Route::get('/userlist', function () { return view('users.index');})->name('userlist');
Route::get('/user/create', function () {return view('users.create');})->name('usercreate');
Route::get('/user/edit', function () {return view('users.edit');})->name('useredit');
Route::get('/user/confirmuser', function () {return view('users.confirm-user');})->name('confirm-user');

// Web Routes for Profile
Route::get('/profile', function () {return view('profile.index');})->name('profile');
Route::get('/profile/edit', function () {return view('profile.edit');})->name('profileedit');

