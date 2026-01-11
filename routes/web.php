<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('articles', AdminArticleController::class);
});

Route::get('/', [FrontArticleController::class, 'index']);
Route::get('/articles/{slug}', [FrontArticleController::class, 'show']);
