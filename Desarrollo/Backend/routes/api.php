<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::get('/user', function(Request $request) {
    return $request -> user();
})->middleware('auth:sanctum');*/

Route::get('/profesores', [ProfesorController::class, 'index']);
Route::get('/profesores/{id}', [ProfesorController::class, 'getProfesor']);
Route::post('/profesores', [ProfesorController::class, 'newProfesor']);
Route::put('/profesores/{id}', [ProfesorController::class, 'updateProfesor']);
Route::delete('/profesores/{id}', [ProfesorController::class, 'destroyProfesor']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'getUser']);
Route::post('/users', [UserController::class, 'newUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'destroyUser']);

Route::post('auth/login', [AuthController::class, 'login']);
//Route::post('/auth/register', [UserController::class, 'register'])->middleware('auth:sanctum');

Route::post('auth/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);