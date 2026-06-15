<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\AttendanceController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UsersController::class);
Route::patch('/users/{id}', [UsersController::class, 'update']);
Route::delete('/users/{id}', [UsersController::class, 'destroy']);

Route::apiResource('salary', SalaryController::class);
Route::patch('/salary/{id}', [SalaryController::class, 'update']);
Route::delete('/salary/{id}', [SalaryController::class, 'destroy']);

Route::apiResource('location', LocationController::class);
Route::patch('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);

Route::apiResource('leave', LeaveApplicationController::class);
Route::patch('/leave/{id}', [LeaveApplicationController::class, 'update']);
Route::delete('/leave/{id}', [LeaveApplicationController::class, 'destroy']);

Route::apiResource('balances', BalanceController::class);
Route::patch('/balances/{id}', [BalanceController::class, 'update']);
Route::delete('/balances/{id}', [BalanceController::class, 'destroy']);

Route::apiResource('attendances', AttendanceController::class);
Route::patch('/attendances/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy']);