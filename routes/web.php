<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('posts', PostController::class)->except(['show']);
Route::resource('categories', CategoryController::class);

Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::patch('/{post}/toggle-status', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');

