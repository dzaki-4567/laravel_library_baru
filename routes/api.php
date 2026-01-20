<?php

use App\Http\Controllers\API\BookServiceController;
use App\Http\Controllers\API\CategoryServiceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/book', BookServiceController::class)->middleware(['auth:sanctum']);
Route::apiResource('/category', CategoryServiceController::class)->middleware(['auth:sanctum']);