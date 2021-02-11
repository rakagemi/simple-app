<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('signin', 'AuthController@signIn');
    Route::post('signin', 'AuthController@SignIn')->name('signin');
    Route::get('signup', 'AuthController@signUp');
    Route::post('signup', 'AuthController@userSignUp')->name('signup/user');
    Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::group(['prefix' => 'admin'], function () {
    //--------------AUTH----------------
    Route::get('login', function () {
        return view('admin.auth.login');
    });
    Route::get('logout', function () {
        return view('admin.auth.login');
    });

    ///-------------MASTER-------------------
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
});
