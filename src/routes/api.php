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

Route::get('/image/showall','Api\PostImageController@showall')->name('api.post_image.showall');
// テスト
Route::get('/image/showtest/{id}','Api\PostImageController@showtestId')->name('api.post_image.showtest');

// 投稿個別
Route::get('/image/show/{id}','Api\PostImageController@showId')->name('api.post_image.showId');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// サインインユーザー
Route::post('/user/signup','Api\SignupController@userSignup')->name('api.userSignup.post');
// サインインショップ
Route::post('/shop/signup','Api\SignupController@shopSignup')->name('api.shopSignup.post');




// カテゴリ別
Route::get('/image/{category}','Api\PostImageController@showCategory')->name('api.post_image.showCategory');

// ショップ認証
Route::middleware(['auth','can:isShop'])->group(function(){
});
// 認証
Route::middleware('auth:api')->group(function () {
    
    Route::get('me','Api\SignupController@me')->name('api.me.get');
    // 投稿
    Route::post('/image','Api\PostImageController@store')->name('api.post_image.upload');
    // お気に入り
    Route::post('/image/{id}/favorite','Api\FavoriteController@store')->name('api.favorite.store');
    // お気に入り削除
    Route::post('/image/{id}/unfavorite','Api\FavoriteController@delete')->name('api.favorite.delete');
    // お気に入り一覧
    Route::get('/myfavorite','Api\FavoriteController@myfavorite')->name('api.favorite.myfavorite');
    // ログアウト
    Route::get('/logout','Api\SignupController@logout')->name('api.logout.get');
    
});