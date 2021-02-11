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

//User
Route::prefix('/user')->group(function () {
    Route::get('/all', 'UserController@index');
    Route::get('/show/{id?}', 'UserController@show');
    Route::post('/input', 'UserController@store');
    Route::put('/edit/{id?}', 'UserController@update');
    Route::delete('/delete/{id?}', 'UserController@destroy');
    Route::post('/login', 'UserController@login');
});

//UserStatus
Route::prefix('/user/status')->group(function () {
    Route::get('/all', 'UserStatusController@index');
    Route::get('/show/{id?}', 'UserStatusController@show');
    Route::post('/input', 'UserStatusController@store');
    Route::put('/edit/{id?}', 'UserStatusController@update');
    Route::delete('/delete/{id?}', 'UserStatusController@destroy');
});


