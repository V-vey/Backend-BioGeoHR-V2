<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\LeaveBalanceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\Feature\GeoFenceController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('users', UsersController::class);

Route::apiResource('salary', SalaryController::class);

Route::apiResource('location', LocationController::class);

Route::apiResource('leave', LeaveApplicationController::class);

Route::apiResource('balance', LeaveBalanceController::class);

Route::apiResource('attendance', AttendanceController::class);

Route::apiResource('userl', UserLocationController::class);

Route::get('testing/{id}', [GeoFenceController::class, 'validationLocation']);
