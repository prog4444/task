<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('task', [TaskController::class, 'index']);
Route::post('task/create', [TaskController::class, 'store']);
Route::get('task/show/{id}', [TaskController::class, 'show']);
Route::post('task/update', [TaskController::class, 'update']);
Route::delete('task/delete/{id}', [TaskController::class, 'destroy']);

// filter task api
Route::get('/tasks/filter', [TaskController::class, 'filter_task']);
