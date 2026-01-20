<?php

use App\Http\Controllers\API\BookServiceController;
use App\Http\Controllers\API\CategoryServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/book', [BookServiceController::class, 'index']);
Route::get('/category', [CategoryServiceController::class, 'index']);
// Route::get('/book/book{id}', [BookServiceController::class, 'show']);
// Route::post('/book', [BookServiceController::class, 'store']);
// Route::put('/book/book{id}', [BookServiceController::class, 'update']);
// Route::delete('/book/{id}', [BookServiceController::class, 'detroy']);
