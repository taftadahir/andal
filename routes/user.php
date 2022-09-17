<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->middleware(['auth', 'admin'])->name('users.')->group(function()
{
    Route::get('/users', 'index')->name('index');
    // Route::get('/users/{user}/edit', 'edit')->name('edit');
    // Route::put('/users/{user}', 'update')->name('update');
});