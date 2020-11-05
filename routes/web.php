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

Route::get('/postlist', function () {
    return view('posts.index');
});

Route::get('/post/create', function () {
    return view('posts.create');
})->name('postcreate');

Route::get('/post/edit', function () {
    return view('posts.edit');
})->name('postedit');

Route::get('/userlist', function () {
    return view('users.index');
});
