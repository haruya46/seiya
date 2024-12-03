<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HpController;
use Illuminate\Support\Facades\Route;
// viewのみ
Route::get('/foam', [HpController::class, 'index'])->name('foam');
Route::get('/site', [HpController::class, 'site'])->name('site');
Route::get('/blog/{article}', [HpController::class, 'show'])->name('show');
Route::get('/', [HpController::class, 'blogindex'])->name('blog');
Route::get('/question', [HpController::class, 'question'])->name('question');
Route::get('/Board', [HpController::class, 'Board'])->name('Board');

// ここまでがview

// お問い合わせ機能
Route::controller(ContactController::class)->group(function(){
    Route::post('contact/store', 'store')->name('contact');
});

// ここまでがお問い合わせ

// 管理者画面
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::post('/posts/temp', [ArticleController::class, 'image'])->name('posts.temp');
    Route::get('/posts/create', [ArticleController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [ArticleController::class, 'store'])->name('posts.store');
    Route::get('/posts/index', [ArticleController::class, 'index'])->name('posts.index');
    Route::get('/posts/{article}', [ArticleController::class, 'show'])->name('posts.show');
    Route::get('/posts/{article}/edit', [ArticleController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{article}/edit/temp', [ArticleController::class, 'image'])->name('posts{article}.temp');
    Route::post('/posts/{article}', [ArticleController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{article}/destroy', [ArticleController::class, 'destroy'])->name('posts.destroy');
    // 画像保存用 
    // ここまでがblog
});


//ログイン後のプロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
