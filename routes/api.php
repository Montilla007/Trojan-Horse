<?php

use App\Http\Controllers\Api\StudentsController;
use App\Http\Controllers\Api\TeachersController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/student/register', [StudentsController::class, 'register']);
Route::post('/auth/student/login', [StudentsController::class, 'login']);
Route::post('/auth/student/logout', [StudentsController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/auth/teacher/register', [TeachersController::class, 'register']);
Route::post('/auth/teacher/login', [TeachersController::class, 'login']);
Route::post('/auth/teacher/logout', [TeachersController::class, 'logout'])->middleware('auth:sanctum');


// Route::apiResource('/classrooms', ClassroomController::class);
// Route::put('/classrooms/{id}', [ClassroomController::class, 'update']);


Route::post('/activity/{classroom_id}', [ActivityController::class, 'create']);
