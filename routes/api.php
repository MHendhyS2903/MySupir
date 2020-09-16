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
    Route::get('user-profile', 'App\Http\Controllers\Api\AuthController@userProfile');

    Route::get('GetUserHistoryOrder', 'App\Http\Controllers\Api\OrderHistoryController@GetUserHistoryOrder');

    Route::post('postOrderNow', 'App\Http\Controllers\Api\OrderNowController@postOrderNow');
    Route::post('postOrderLater', 'App\Http\Controllers\Api\OrderLaterController@postOrderLater');
});

Route::get('GetAllCategory', 'App\Http\Controllers\Api\CategoryController@GetAllCategory');
Route::get('GetAllRate', 'App\Http\Controllers\Api\RateController@GetAllRate');


Route::group([
    'middleware' => 'assign.guard:drivers',
    'prefix' => 'auth'

], function ($router) {
    Route::post('driver-login', 'App\Http\Controllers\Api\DriverController@login');
    Route::post('driver-register', 'App\Http\Controllers\Api\DriverController@register');
    Route::post('driver-logout', 'App\Http\Controllers\Api\DriverController@logout');
    Route::post('driver-refresh', 'App\Http\Controllers\Api\DriverController@refresh');
    Route::get('driver-profile', 'App\Http\Controllers\Api\DriverController@driverProfile');
    Route::put('driver-update', 'App\Http\Controllers\Api\DriverController@updateDriver');
    Route::put('assign-driver-ordernow/{id}', 'App\Http\Controllers\Api\OrderNowController@assignDriverOrderNow');
});




