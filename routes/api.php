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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('user/my-profile', 'API\UserController@myProfile');
    Route::post('user/{id}', 'API\UserController@userProfile');

    Route::post('trip/create', 'API\TripController@create');
    Route::post('trip/list', 'API\TripController@find');
    Route::post('trip/{id}', 'API\TripController@show');

    Route::post('place/create', 'API\PlaceController@create');
    Route::post('place/list', 'API\PlaceController@showAll');
});
