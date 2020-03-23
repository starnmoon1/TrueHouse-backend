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

//login
Route::post('/login','Api\LoginController@login');
Route::post('/login-social', 'SocialAuthController@authorizeSocial');
//register
Route::post('/register','Api\UserController@register');
Route::get('/{id}','Api\UserController@findById');
