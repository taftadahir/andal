<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::controller(SettingController::class)->middleware(['auth', 'admin'])->name('settings.')->group(function()
{
    Route::get('/settings', 'index')->name('index');
});