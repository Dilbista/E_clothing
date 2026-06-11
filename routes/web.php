<?php

use App\Http\Controllers\Api\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('frondend.Home');
});

    Route::get('/cart', function () {
        return view('frondend.cart');
    });


    Route::get('/login', function () {
        return view('auth.Login');
    })->name('login');


    Route::get('/register', function () {
        return view('auth.Registration');
    });


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', function () {
        return view('Backend.AdminDashboard');
    })->name('admin');

});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');


Route::post('/register', [AuthController::class, 'register'])->name('register.post');



    
    // Route::get('/admin', function () {
    //     return view('Backend.AdminDashboard');
    // })->name('admin');

