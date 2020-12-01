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

// Web Routes for profile
Route::get('/user/profile', 'ProfileController@profile')->name('user.profile');
Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
Route::resource('/profile', 'ProfileController');

Route::get('/post/upload', 'PostController@uploadindex')->name('post.upload');
Route::resource('/post', 'PostController');


Route::group(['middleware' => ['prevent-back-history', 'auth']], function () {

    // Web Routes for Post
    Route::post('/post/uploaded', 'PostController@importExcelCSV');
    Route::post('/user/back_from_confirm', 'PostController@cancel_btn')->name('post.cancel_btn');
    Route::post('/post/confirmation', 'PostController@confirmation');
    // Route::get('/post/upload-post', function () {
    //     return view('posts.upload-post');
    // })->name('upload-post');

    // Web Routes for User
    Route::get('/user/change-password', 'UserController@change_password')->name('user.change_password');
    Route::post('/user/confirmation', 'UserController@confirmation');
    Route::post('/user/update-password', 'UserController@update_password');
    Route::resource('/user', 'UserController');
});
