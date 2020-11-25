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
// Web Routes for User
Route::get('/user/change-password', 'UserController@change_password')->name('user.change_password');
Route::get('/user/profile', 'UserController@profile')->name('user.profile');
Route::resource('/user', 'UserController');
Route::post('/user/confirmation', 'UserController@confirmation');
Route::post('/user/update-password', 'UserController@update_password');

Route::group(['middleware' => ['prevent-back-history', 'auth']], function () {

    Route::get('/post/upload-post', function () {
        return view('posts.upload-post');
    })->name('upload-post');

    // Web Routes for Post
    Route::get('/post/upload-file', 'PostController@upload_index')->name('post.upload');
    Route::post('/post/uploaded', 'PostController@importExcelCSV');
    Route::post('/user/back_from_confirm', 'PostController@cancel_btn')->name('post.cancel_btn');
    Route::post('/post/confirmation', 'PostController@confirmation');
    Route::resource('/post', 'PostController');



    
});
