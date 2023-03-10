<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth:sanctum']);

Route::post('/login', [AuthenticationController::class, 'login']);