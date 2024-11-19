<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HpController::class, 'index'])->name('welcome');
Route::get('/blog/{article}', [HpController::class, 'show'])->name('show');
Route::get('/blog', [HpController::class, 'blogindex'])->name('blog');

// お問い合わせ
Route::controller(ContactController::class)->group(function(){
    Route::post('contact/store', 'store')->name('contact');
});

Route::post('/posts/store', [ArticleController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [ArticleController::class, 'create'])->name('posts.create');
Route::get('/posts/index', [ArticleController::class, 'index'])->name('posts.index');
Route::get('/posts/{article}', [ArticleController::class, 'show'])->name('posts.show');
Route::get('/posts/{article}/edit', [ArticleController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{article}', [ArticleController::class, 'update'])->name('posts.update');
Route::delete('/posts/{article}/destroy', [ArticleController::class, 'destroy'])->name('posts.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // リッチテキストエディター
});

require __DIR__.'/auth.php';
