<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users-render', [UserController::class, 'renderFrontend'])->name('users.index');
