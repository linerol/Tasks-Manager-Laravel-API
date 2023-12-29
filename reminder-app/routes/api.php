<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

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

// Route::resource('tasks', TaskController::class);

// Route::group(['prefix' => 'auth'], function () {
//     Route::post('register', [AuthController::class, 'register']);
//     Route::post('login', [AuthController::class, 'login']);

//     Route::group(['middleware' => 'auth:sanctum'], function() {
//         Route::post('user', [AuthController::class,'user']);
//         Route::post('logout', [AuthController::class,'logout']);

//         Route::get('tasks', [TaskController::class, 'index']);
//         Route::post('tasks', [TaskController::class, 'store']);
//         Route::get('tasks/{task}', [TaskController::class, 'show']);
//         Route::match(['patch', 'put'], 'tasks/{task}', [TaskController::class, 'update']);
//         Route::delete('tasks', [TaskController::class, 'destroy']);
//     });

// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
