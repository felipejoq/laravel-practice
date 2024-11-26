<?php

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

Route::get('/contact-1', function () {

    $data = ['name1' => 'John Doe'];

    return redirect()
        ->route('contact.2')
        ->setStatusCode(301);

    // return view('contact1', $data);

})->name('contact.1');

Route::get('/contact-2', function () {

    $data = ['name' => 'Jane Doe'];

    return view('contact2', $data);

})->name('contact.2');
