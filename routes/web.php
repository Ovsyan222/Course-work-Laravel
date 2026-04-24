<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main/hello');
});

Route::get('/about', function () {
    return view('main/about');
});

Route::get('/contact', function () {
    $contact = [
        'name' => 'Polytech',
        'adress' => 'B.Semenovskaya',
        'phone' => ' 8(495) 423-2323',
        'email' => '@mospilytech.ru'
    ];
    return view('main/contact', ['contact' => $contact]);
});
