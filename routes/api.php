<?php

use Illuminate\Http\Request;

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


// ログイン中のみ処理を実行する
Route::group(['middleware' => ['auth']], function () {
    // api関連の処理をまとめる（urlに自動的に/apiが加わる）
    Route::group(['middleware' => ['api']], function(){
        // 表示
        Route::get('/', 'Api\DevicesController@index');
        // 登録
        Route::post('/devices', 'Api\DevicesController@store');
        // 削除
        Route::post('/device/{device}', 'Api\DevicesController@destroy');
    });
});

Route::get('/personal', function(){
    $user = App\User::find(1);
    $token = $user->createToken('token_for_user1')->accessToken;
    return response()->json(['token' => $token]);
});
