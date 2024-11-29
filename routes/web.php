<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);

Route::get('/', function () {
    return view('index');
});


Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
