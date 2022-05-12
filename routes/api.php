<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\{ AuthController, DriverController, RouteController, SchedulerController, VehicleController };
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');
    Route::post('register',[AuthController::class, 'register'])->name('register');

    Route::apiResource('drivers', DriverController::class);
    Route::apiResource('routes', RouteController::class);
    Route::apiResource('scheduler', SchedulerController::class);
    Route::apiResource('vehicles', VehicleController::class);
});
