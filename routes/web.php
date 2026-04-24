<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'signUp']);
Route::get('/', [MainController::class, 'index']);
Route::get('/gallery/{full_image}', [MainController::class, 'show']);

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
