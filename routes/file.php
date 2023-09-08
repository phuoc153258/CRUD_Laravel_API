<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


Route::post('/', [FileController::class, 'create']);

Route::delete('/{name?}', [FileController::class, 'delete']);
