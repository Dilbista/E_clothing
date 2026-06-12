<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frondend.home');
// });
Route::get('/', function () {
    return view('test');
});

Route::get('/women', function () {
    return view('frondend.women');
})->name('frontend.women');

Route::get('/men', function () {
    return view('frondend.men');
})->name('frontend.men');

Route::get('/accessories', function () {
    return view('frondend.accessories');
})->name('frontend.accessories');

Route::get('/footwear', function () {
    return view('frondend.footwear');
})->name('frontend.footwear');

Route::get('/new-arrivals', function () {
    return view('frondend.new-arrivals');
})->name('frontend.new-arrivals');

Route::get('/sale', function () {
    return view('frondend.sale');
})->name('frontend.sale');

Route::get('/about', function () {
    return view('frondend.about');
})->name('frontend.about');

Route::get('/userprofile', function () {
    return view('frondend.userprofile');
})->name('frontend.userprofile');

Route::get('/orders', function () {
    return view('frondend.orders');
})->name('frontend.orders');

Route::get('/wishlist', function () {
    return view('frondend.wishlist');
})->name('wishlist');
Route::get('/cart', function () {
    return view('frondend.cart');
})->name('cart');

Route::get('/login', function () {
    return view('auth.Login');
})->name('login');

Route::get('/register', function () {
    return view('auth.Registration');
})->name('register');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('Backend.AdminDashboard');
    })->name('admin');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');