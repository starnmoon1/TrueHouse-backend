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

//api house
Route::get('houses/search', 'Api\HouseController@search');
Route::get('houses', 'Api\HouseController@index');
Route::post('houses', 'Api\HouseController@store');
Route::get('houses/{id}', 'Api\HouseController@show');
Route::get('houses/{id}/orders', 'Api\OrderController@getOrdersByHouseID');
Route::patch('houses/{id}/update', 'Api\HouseController@update');
Route::get('houses/{id}/list-order', 'Api\HouseController@getByHouse');
Route::get('houses/{id}/list-order-by-user', 'Api\HouseController@getByUserId');


Route::post('/login','Api\LoginController@login');
Route::post('/login-social', 'SocialAuthController@authorizeSocial');

//register
Route::post('/register','Api\UserController@register');
Route::get('/{id}','Api\UserController@findById');

// api user
Route::get('users/list', 'Api\UserController@index');
Route::post('users', 'Api\UserController@store');
Route::get('users/{id}', 'Api\UserController@show');
Route::get('users/{id}/houses', 'Api\UserController@getALlHouseByUserID');

//api image
Route::get('multiple-image/{id}', 'Api\ImageController@index');
Route::post('multiple-image/{id}', 'Api\ImageController@store');

//api order
Route::post('order', 'Api\OrderController@store');

Route::get('comments/list', 'Api\CommentController@index');
Route::post('comments', 'Api\CommentController@store');
Route::get('comments/{id}', 'Api\CommentController@show');
