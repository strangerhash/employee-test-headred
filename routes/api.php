<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route to fetch all users
Route::get('/users', [UserController::class, 'index']);

// Route to search users by email or first name
Route::get('/users/search', [UserController::class, 'search']);