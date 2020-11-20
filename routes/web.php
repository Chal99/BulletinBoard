<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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
    return redirect('/post');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/change-password', 'UserController@change_password')->name('user.change_password');
Route::resource('/user', 'UserController');
Route::post('/user/confirmation', 'UserController@confirmation');
Route::post('/user/update-password', 'UserController@update_password');
Route::group(['middleware' => ['prevent-back-history', 'auth']], function () {

    // Web Routes for Post
    // Route::get('/postlist', function () {
    //     return view('posts.index');
    // })->name('post-list');
    // Route::get('/post-list', [PostController::class, 'index']);
    // Route::get('/post/create', [PostController::class, 'create']);
    // Route::get('/post/create', function () {
    //     return view('posts.create');
    // })->name('post-create');
    Route::get('/post/edit', function () {
        return view('posts.edit');
    })->name('post-edit');
    // Route::get('/post/confirm-post', [PostController::class, 'update']);
    // Route::get('/post/confirm-post', function () {
    //     return view('posts.confirm-post');
    // })->name('confirm-post');
    Route::get('/post/upload-post', function () {
        return view('posts.upload-post');
    })->name('upload-post');
    // Route::post('/change-password', function () {
    //     return view('users.change-password');
    // })->name('change-password');

    // // Web Routes for User
    // Route::get('/userlist', function () {
    //     return view('users.index');
    // })->name('user-list');
    // Route::get('/user-list', [UserController::class, 'index']);
    // Route::get('/user/create', function () {
    //     return view('users.create');
    // })->name('user-create');
    // Route::get('/user/edit', function () {
    //     return view('users.edit');
    // })->name('user-edit');
    // Route::get('/user/confirmuser', function () {
    //     return view('users.confirm-user');
    // })->name('confirm-user');

    // Web Routes for Profile
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile-edit');

    Route::post('/post/confirmation', 'PostController@confirmation');
    Route::resource('/post', 'PostController');
   
});
