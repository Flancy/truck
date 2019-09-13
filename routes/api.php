<?php

use Illuminate\Http\Request;
use Http\Controllers\Api\ApiUserController;

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

Route::apiResource('/users', 'Api\ApiUserController');

Route::delete('/userBan/{id}', 'Api\ApiUserController@banUser');
Route::delete('/userUnBan/{id}', 'Api\ApiUserController@unBanUser');

Route::get('/verifyUser/{id}', 'Api\ApiUserController@verifyUser');
Route::get('/unVerifyUser/{id}', 'Api\ApiUserController@unVerifyUser');
