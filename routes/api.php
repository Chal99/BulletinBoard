<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\API\PostApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

Route::get('/test',function(){
    return response()->json(['message' => 'HelloWorld']);
});

Route::post('/post/import',[PostApiController::class,'importExcelCSV']);
Route::apiResource('post',PostApiController::class);
Route::post('/user/image',[UserApiController::class,'storeImage']);
Route::get('/user/image/confirm',[UserApiController::class,'ImageConfirm']);
Route::post('/login',[UserApiController::class,'login']);
Route::post('/user/{user}',[UserApiController::class,'update']);
Route::put('/user/changepassword/{user}',[UserApiController::class,'changePassword']);
Route::apiResource('user',UserApiController::class);