<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;



use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Category\CategoryController;
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

    Route::get('/admin/productmanagement', function () {
        return view('Backend.productmanagement');
    })->name('admin.productmanagement');

    Route::get('/admin/ordersmanagements', function () {
        return view('Backend.ordersmanagements');
    })->name('admin.ordersmanagements');

    Route::get('/admin/usermanagement', function () {
        return view('Backend.usermanagement');
    })->name('admin.usermanagement');

    Route::get('/admin/categoriesmanagements', function () {
        return view('Backend.categoriesmanagements');
    })->name('admin.categoriesmanagements');

    Route::get('/admin/productsbrand', function () {
        return view('Backend.productbrand');
    })->name('admin.productsbrand');

    Route::get('/admin/cauponmanagement', function () {
        return view('Backend.cauponmanagement');
    })->name('admin.cauponmanagement');

    Route::get('/admin/inventorymanagement', function () {
        return view('Backend.inventorymanagement');
    })->name('admin.inventorymanagement');

    Route::get('/admin/banneremanagement', function () {
        return view('Backend.banneremanagement');
    })->name('admin.banneremanagement');

    Route::get('/admin/notificationmanagement', function () {
        return view('Backend.notificationmanagement');
    })->name('admin.notificationmanagement');

    Route::get('/admin/adminprofilemanagement', function () {
        return view('Backend.adminprofilemanagement');
    })->name('admin.adminprofilemanagement');
    Route::post('/users/store', [UserController::class, 'store'])->name('users_store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users_destroy');
    Route::get('/admin/usermanagement', [UserController::class, 'index'])->name('admin.usermanagement');



        // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categoriesmanagements');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Brand Routes
    Route::get('/brands', [BrandController::class, 'index'])->name('productsbrand');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');


route::get('auth/google', [GoogleController::class, "redirectToGoogle"])->name('redirect.google');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
