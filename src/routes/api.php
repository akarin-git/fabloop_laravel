<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// サインインユーザー
Route::post('/user/signup','Api\SignupController@userSignup')->name('api.userSignup.post');
// サインインショップ
Route::post('/shop/signup','Api\SignupController@shopSignup')->name('api.shopSignup.post');


// 認証
Route::middleware('auth:api')->group(function () {

    // ショップ認証
    Route::middleware(['auth','can:isShop'])->group(function(){
    });
    
    // 投稿
    Route::post('/image','Api\PostImageController@store')->name('api.post_image.upload');
    // 投稿一覧
    Route::get('/image/show','Api\PostImageController@show')->name('api.post_image.upload');
    // ログアウト
    Route::get('/logout','Api\SignupController@logout')->name('api.logout.get');
    
    });