<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserTaskController;



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Task API Endpoints
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

// TASK User API Endpoints
Route::get('/task-users', [TaskUserController::class, 'index']);
Route::get('/task-users/{id}', [TaskUserController::class, 'show']);
Route::post('/task-users', [TaskUserController::class, 'store']);
Route::put('/task-users/{id}', [TaskUserController::class, 'update']);
Route::delete('/task-users/{id}', [TaskUserController::class, 'destroy']);
Route::post('/task-users/{id}', [TaskUserController::class, 'login']);

// Status API Endpoints
Route::get('/statuses', [StatusController::class, 'index']);
Route::get('/statuses/{id}', [StatusController::class, 'show']);
Route::post('/statuses', [StatusController::class, 'store']);
Route::put('/statuses/{id}', [StatusController::class, 'update']);
Route::delete('/statuses/{id}', [StatusController::class, 'destroy']);

// UserTask API Endpoints
Route::get('/user-tasks', [UserTaskController::class, 'index']);
Route::get('/user-tasks/{id}', [UserTaskController::class, 'show']);
Route::post('/user-tasks', [UserTaskController::class, 'store']);
Route::put('/user-tasks/{id}', [UserTaskController::class, 'update']);
Route::delete('/user-tasks/{id}', [UserTaskController::class, 'destroy']);

