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

Route::group(['middleware' => ['api']], function(){
  // 認証が必要ないメソッド
  Route::post('/login', 'ApiController@login');
  Route::post('/register', 'ApiController@register');

  Route::group(['middleware' => ['jwt.auth']], function () {
      // 認証が必要なメソッド
      Route::get("/me", "ApiController@me");
  });
});