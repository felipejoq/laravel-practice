<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Global\ContactController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::resource('categories', CategoryController::class);

Route::get('/contact-1', [ContactController::class, 'index'])
    ->name('contact.1');

Route::get('/contact-2', [ContactController::class, 'contact2'])
    ->name('contact.2');

Route::get('/test', function () {
    $data = [
        'name' => 'John Doe',
        'age' => 30,
        'address' => '123 Main St, New York, NY 10030',
    ];
    return view('test', $data);
});
