<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'registerForm');
    Route::get('/login', 'loginForm');
    Route::get('/forgot-password', 'forgotForm');

    Route::post('/register-user', 'register');
    Route::post('/login-user', 'login');
    Route::post('/forgot-password-user', 'forgotPassword');
    Route::post('/logout', 'logout');
});