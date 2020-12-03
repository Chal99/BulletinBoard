<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\PostApiController;
use Illuminate\Http\Response;
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

// Web Routes for profile
Route::get('/user/profile', [ProfileController::class, 'profile'])->name('user.profile');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::resource('/profile', ProfileController::class);

Route::get('/post/upload', [PostController::class, 'uploadindex'])->name('post.upload');
Route::resource('/post', PostController::class);


Route::group(['middleware' => ['prevent-back-history', 'auth']], function () {

    // Web Routes for Post
    Route::post('/post/uploaded', [PostController::class, 'importExcelCSV']);
    Route::post('/user/back_from_confirm', [PostController::class, 'cancel_btn'])->name('post.cancel_btn');
    Route::post('/post/confirmation', [PostController::class, 'confirmation']);
    // Route::get('/post/upload-post', function () {
    //     return view('posts.upload-post');
    // })->name('upload-post');

    // Web Routes for User
    Route::get('/user/change-password', [UserController::class, 'change_password'])->name('user.change_password');
    Route::post('/user/confirmation', [UserController::class, 'confirmation']);
    Route::post('/user/update-password', [UserController::class, 'update_password']);
    Route::resource('/user', UserController::class);

});
