<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

<<<<<<< HEAD

Route::get('/weight_logs',[AuthController::class, 'log']);
Route::post('/weight_logs/create', [AuthController::class, 'postCreate']);
Route::get('/weight_logs/search',[AuthController::class, 'search']);
Route::get('/weight_logs/{weightLogId}', [AuthController::class, 'getId']);
Route::post('/weight_logs/{weightLogId}/update', [AuthController::class, 'postUpdate']);
Route::get('/weight_logs/{weightLogId}/update', [AuthController::class, 'postUpdate']);
Route::post('/weight_logs/{:weightLogId}/deleate', [AuthController::class, 'postDelete']);
Route::post('/weight_logs/goal_setting', [AuthController::class, 'postGoal']);

=======
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::get('/weight_logs',[AuthController::class, 'logs']);
});
>>>>>>> origin/main
