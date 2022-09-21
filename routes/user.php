<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->middleware(['auth', 'admin'])->name('users.')->group(function () {
    Route::get('/users', 'index')->name('index');

    Route::get('/users/{user}/edit', 'edit')->name('edit');
    Route::put('/users/{user}', 'update')->name('update');

    Route::delete('/users/{user}', 'destroy')->name('destroy');
});