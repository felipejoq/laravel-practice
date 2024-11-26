<?php

use App\Http\Controllers\Global\Contact;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $data = [
        'name' => 'John Doe',
        'age' => 30,
        'address' => '123 Main St, New York, NY 10030',
    ];
    return view('test', $data);
});

Route::get('/contact-1', [Contact::class, 'index'])
    ->name('contact.1');

Route::get('/contact-2', [Contact::class, 'contact2'])
    ->name('contact.2');
