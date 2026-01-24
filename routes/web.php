<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;

/*
| Front
*/
Route::get('/', function () {
    return view('welcome');
});

/*
| Dashboard Breeze
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
| ADMIN – Articles (admin + editor)
*/
Route::middleware(['auth', 'admin', 'can:viewAny,App\Models\Article'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Articles : admin + editor
        Route::resource('articles', ArticleController::class);
    });

/*
| ADMIN – Users (admin SEULEMENT)
*/
Route::middleware(['auth', 'admin.only'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Users : admin only
        Route::resource('users', UserController::class)
            ->only(['index', 'create', 'store']);
    });

/*
| Auth (Breeze)
*/
require __DIR__ . '/auth.php';
