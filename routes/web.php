<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('homepage');
Route::get('/profile/{username}', [UserController::class, 'showUser'])->name('users.show');
Route::get('/public-profile/{username}', [UserController::class, 'publicUser'])->name('users.publicUser');

