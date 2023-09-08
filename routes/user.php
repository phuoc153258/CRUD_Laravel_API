<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);

Route::get('/{id}', [UserController::class, 'show']);

Route::post('/', [UserController::class, 'create']);

Route::put('/{id}', [UserController::class, 'update']);

Route::delete('/{id}', [UserController::class, 'delete']);
