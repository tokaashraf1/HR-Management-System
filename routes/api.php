<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TaskController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/workers', [WorkerController::class, 'index'])->middleware('auth:sanctum');
Route::get('/tasks', [TaskController::class, 'allTasks'])->middleware('auth:sanctum');
Route::get('/tasks/{status}', [TaskController::class, 'tasksByStatus'])->middleware('auth:sanctum');
Route::get('/task-stats', [TaskController::class, 'taskStats'])->middleware('auth:sanctum');