<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('test');
// });

Route::get('/women', [HomeController::class, 'women'])
    ->name('frontend.women');

Route::get('/men', [HomeController::class, 'men'])
    ->name('frontend.men');

Route::get('/accessories', [HomeController::class, 'accessories'])
    ->name('frontend.accessories');

Route::get('/footwear', [HomeController::class, 'footwear'])
    ->name('frontend.footwear');

Route::get('/new-arrivals', [HomeController::class, 'newArrival'])
    ->name('frontend.new-arrivals');

Route::get('/sale', [HomeController::class, 'sale'])
    ->name('frontend.sale');

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

// Cart page is handled via Auth middleware below

Route::get('/product/{id}', [HomeController::class, 'viewDetails'])
    ->name('frontend.viewDetails');

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

    Route::get('/admin/productmanagement', [ProductController::class, 'index'])->name('admin.productmanagement');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/admin/ordersmanagements', function () {
        return view('Backend.ordersmanagements');
    })->name('admin.ordersmanagements');

    Route::get('/admin/usermanagement', function () {
        return view('Backend.usermanagement');
    })->name('admin.usermanagement');

    Route::get('/admin/categoriesmanagements', [CategoryController::class, 'index'])->name('admin.categoriesmanagements');

    Route::get('/admin/productsbrand', [BrandController::class, 'index'])->name('admin.productsbrand');

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
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');


route::get('auth/google', [GoogleController::class, "redirectToGoogle"])->name('redirect.google');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post(
    '/profile/update-info',
    [UserProfileController::class, 'updateInfo']
)
    ->name('profile.update.info');

Route::post(
    '/profile/update-password',
    [UserProfileController::class, 'updatePassword']
)
    ->name('profile.update.password');
Route::post('/addresses', [AddressController::class, 'store'])
    ->name('addresses.store');

Route::put(
    '/addresses/{address}',
    [AddressController::class, 'update']
)
    ->name('addresses.update');

Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])
    ->name('addresses.destroy');

use App\Http\Controllers\CouponController;

Route::prefix('admin/coupons')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('/data', [CouponController::class, 'data'])->name('coupons.data');
    Route::post('/', [CouponController::class, 'store'])->name('coupons.store');
    Route::put('/{coupon}', [CouponController::class, 'update'])->name('coupons.update');
    Route::delete('/{coupon}', [CouponController::class, 'destroy'])->name('coupons.destroy');
});

use App\Http\Controllers\BannerController;

Route::prefix('admin/banners')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/data', [BannerController::class, 'data'])->name('banners.data');
    Route::post('/', [BannerController::class, 'store'])->name('banners.store');
    Route::put('/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::post('/{banner}/reorder', [BannerController::class, 'reorder'])->name('banners.reorder');
    Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

// this for used for backend crud operation for about page

// Route::get('/about', [AboutController::class, 'index'])->name('about.index');
// Route::post('/about', [AboutController::class, 'store'])->name('about.store');
// Route::put('/about/{about}', [AboutController::class, 'update'])->name('about.update');
// Route::delete('/about/{about}', [AboutController::class, 'destroy'])->name('about.destroy');

// end backend abouts

Route::middleware(['auth'])->group(function () {
    // Cart AJAX actions
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
    
    // Checkout redirection
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});