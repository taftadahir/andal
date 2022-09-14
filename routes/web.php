<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ FrontendController::class, 'home' ])->name('home');
Route::get('/single/{article:slug}', [ FrontendController::class, 'single' ])->name('single');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
