<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\AuthController;

Route::apiResource('cars', CarController::class);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);
Route::get('/me', [AuthController::class, 'me']);
Route::get('/cars/model', [CarController::class, 'filterByModel']);