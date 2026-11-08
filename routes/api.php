<?php

use App\Http\Controllers\Api\MekanikController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('mekanik', MekanikController::class);