<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');




Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('Employees', EmployeeController::class);
    Route::get('Employees/search/{nama}', [EmployeeController::class, 'search']);
    Route::apiResource('Employees.cuti', CutiController::class)->shallow();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
