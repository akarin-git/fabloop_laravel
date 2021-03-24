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


// Route::post('/signup', function (Request $request) {
//     // とりあえず、ベタ書きでレスポンスする
//     // レスポンスの形をswaggerと合わせる
//     return response()->json([
//         'id' => 1,
//         'nickname' => 'ニックネーム',
//         'email' => 'test@example.com',
//     ]);
// });