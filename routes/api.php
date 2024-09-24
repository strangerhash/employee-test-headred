<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route to fetch all users
Route::get('/users', [UserController::class, 'index']);

// Route to search users by email or first name
Route::get('/users/search', [UserController::class, 'search']);