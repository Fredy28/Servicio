<?php

use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('profesores', ProfesorController::class);
Route::resource('users', UserController::class);
Route::post('/admin/register', [UserController::class, 'register'])->middleware('auth:sanctum');