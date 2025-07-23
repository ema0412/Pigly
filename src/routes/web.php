<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/weight_logs',[AuthController::class, 'log']);
Route::post('/weight_logs/create', [AuthController::class, 'postCreate']);
Route::get('/weight_logs/search',[AuthController::class, 'search']);
Route::get('/weight_logs/{weightLogId}', [AuthController::class, 'getId']);
Route::post('/weight_logs/{weightLogId}/update', [AuthController::class, 'postUpdate']);
Route::get('/weight_logs/{weightLogId}/update', [AuthController::class, 'postUpdate']);
Route::post('/weight_logs/{:weightLogId}/deleate', [AuthController::class, 'postDelete']);
Route::post('/weight_logs/goal_setting', [AuthController::class, 'postGoal']);

