<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
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

Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'show']);
Route::post('/course', [CourseController::class, 'create']);
Route::delete('/course/{id}', [CourseController::class, 'destroy']);
Route::put('/course/{id}', [CourseController::class, 'edit']);
