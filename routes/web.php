<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;


Route::get('/', function () {
    return view('welcome');
});

/**
 * Dashboard Breeze
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Admin
 */
Route::middleware(['auth', 'admin', 'can:viewAny,App\Models\Article'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('articles', ArticleController::class);
    });

require __DIR__.'/auth.php';
