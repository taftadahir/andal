<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ FrontendController::class, 'home' ])->name('home');
Route::get('/single/{article:slug}', [ FrontendController::class, 'single' ])->name('single');

Route::middleware(['auth', 'admin'])->group(function()
{
    Route::get('/dashboard', function () {
        return Inertia::render('Laru/Dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
require __DIR__.'/article.php';
require __DIR__.'/user.php';
require __DIR__.'/setting.php';
require __DIR__.'/asset.php';
