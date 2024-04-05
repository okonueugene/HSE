<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\v1\TasksController;
use App\Http\Controllers\Api\v1\AuthenticationController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::prefix('/v1')->group(
    function () {
        Route::post('/login', [AuthenticationController::class, 'login']);
        Route::post('/users/register', [UserController::class, 'registerUnAuthenticatedUser']);

        Route::group(['middleware' => ['auth:sanctum', 'ensure.json.header']], function () {
            Route::post('/logout', [AuthenticationController::class, 'logout']);

            //tasks
            Route::ApiResource('/tasks', TasksController::class);
        });
    }
);
