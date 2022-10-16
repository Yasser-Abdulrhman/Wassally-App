<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register',[AuthController::class,'register']);

// Route::group(['middleware' => ['api:auth']], function()
// {

//    Route::post('register',[AuthController::class,'register']);
//    Route::post('login',[AuthController::class,'login']);

// });




Route::group(['middleware' => 'api','prefix' => 'auth'], function () {
     Route::post('register', [AuthController::class, 'register']);
     Route::post('login',[AuthController::class,'login']);
   });

Route::group(['middleware' => ['auth:api']], function() {
    Route::Resource('roles', RoleController::class);
    Route::Resource('users', UserController::class);

});







