<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::resource('/article', ArticleController::class)->middleware('auth:sanctum');
Route::resource('/article', ArticleController::class);

// Route::group(['prefix'=>'/article'], function() {
//     Route::get('', [ArticleController::class, 'index']);
//     Route::get('/create', [ArticleController::class, 'create']);
//     Route::get('/store', [ArticleController::class, 'store']);
// });

Route::get('/auth/create', [AuthController::class, 'create']);
Route::post('/auth/signUp', [AuthController::class, 'signUp']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/signIn', [AuthController::class, 'customLogin']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

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
