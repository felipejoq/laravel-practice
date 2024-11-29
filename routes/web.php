<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('posts', PostController::class)->except(['show']);

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::patch('/posts/{post}/toggle-status', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');

Route::resource('categories', CategoryController::class);
