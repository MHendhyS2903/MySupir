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

Route::group([
    'middleware' => 'assign.guard:users',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
    Route::get('user-profile', 'App\Http\Controllers\Api\AuthController@userProfile');
});

<<<<<<< HEAD
Route::get('category', 'App\Http\Controllers\Api\CategoryController@GetAllCategory');
=======
Route::group([
    'middleware' => 'assign.guard:drivers',
    'prefix' => 'auth'

], function ($router) {
    Route::post('driver-login', 'App\Http\Controllers\Api\DriverController@login');
    Route::post('driver-register', 'App\Http\Controllers\Api\DriverController@register');
    Route::post('driver-logout', 'App\Http\Controllers\Api\DriverController@logout');
    Route::post('driver-refresh', 'App\Http\Controllers\Api\DriverController@refresh');
    Route::get('driver-profile', 'App\Http\Controllers\Api\DriverController@driverProfile');
});



>>>>>>> 177e2bc855ff55a698014debed8f35a83dc0c6fa
