<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

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




// Route::get('/men', function () {
//     return view('frondend.men');
// })->name('frontend.men');

// Route::get('/accessories', function () {
//     return view('frondend.accessories');
// })->name('frontend.accessories');

// Route::get('/footwear', function () {
//     return view('frondend.footwear');
// })->name('frontend.footwear');

// Route::get('/new-arrivals', function () {
//     return view('frondend.new-arrivals');
// })->name('frontend.new-arrivals');

// Route::get('/sale', function () {
//     return view('frondend.sale');
// })->name('frontend.sale');

Route::get('/about', function () {
    return view('frondend.about');
})->name('frontend.about');

Route::get('/userprofile', function () {
    return view('frondend.userprofile');
})->name('frontend.userprofile');

Route::get('/orders', function () {
    return view('frondend.orders');
})->name('frontend.orders');

// Route::get('/wishlist', function () {
//     return view('frondend.wishlist');
// })->name('wishlist');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/wishlist', [WishlistController::class, 'index'])
    ->middleware('auth')
    ->name('wishlist');

Route::middleware(['auth'])->group(function () {
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggleWishlist']);
});


Route::get('/cart', function () {
    return view('frondend.cart');
})->name('cart');

Route::get('/product/{id}', [HomeController::class, 'viewDetails'])
    ->name('frontend.viewDetails');


Route::get('/login', function () {
    return view('auth.Login');
})->name('login');

Route::get('/register', function () {
    return view('auth.Registration');
})->name('register');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    // Route::get('/admin/productmanagement', function () {
    //     return view('Backend.productmanagement');
    // })->name('admin.productmanagement');

    // Route::get('/admin/ordersmanagements', function () {
    //     return view('Backend.ordersmanagements');
    // })->name('admin.ordersmanagements');

    Route::get('/admin/usermanagement', function () {
        return view('Backend.usermanagement');
    })->name('admin.usermanagement');

    Route::get('/admin/categoriesmanagements', [App\Http\Controllers\Category\CategoryController::class, 'index'])->name('admin.categoriesmanagements');

    Route::post('/categories/store', [App\Http\Controllers\Category\CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Route::get('/admin/productsbrand', function () {
    //     return view('Backend.productbrand');
    // })->name('admin.productsbrand');

    Route::get('/admin/productsbrand', [BrandController::class, 'index'])->name('admin.productsbrand');

    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    Route::delete('/productsbrand/{Brand_id}', [BrandController::class, 'destroy'])->name('brands.destroy');



    Route::get('/admin/productmanagement', [ProductController::class, 'index'])->name('admin.productmanagement');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

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
    Route::delete('categories/{category_id}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    // Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    // Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // admin
    // Route::resource(
    // 'admin/categories',
    // CategoryController::class
    // );

    // Brand Routes
    Route::get('/admin/productsbrand', [BrandController::class, 'index'])->name('admin.productsbrand');

    // Route::get('/brands', [BrandController::class, 'index'])->name('productsbrand');
    // Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    // Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
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

// Route::middleware(['auth'])->group(function () {
//     Route::get('/wishlist', [WishlistController::class, 'index'])
//         ->name('wishlist');
//     // Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
//     Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
//     Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
// });



Route::prefix('admin/banners')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/data', [BannerController::class, 'data'])->name('banners.data');
    Route::post('/', [BannerController::class, 'store'])->name('banners.store');
    Route::put('/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::post('/{banner}/reorder', [BannerController::class, 'reorder'])->name('banners.reorder');
    Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
});



Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp']);

Route::get('/verify-otp', [ForgotPasswordController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('verify.otp');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('reset.password');

// POST: Handles the submission (no token in URL)
Route::post('/reset-password/submit', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});





Route::middleware(['auth'])->group(function () {
    // Cart AJAX actions
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');

    // Cart dropdown partial
    Route::get('/cart/dropdown', [CartController::class, 'dropdown'])->name('cart.dropdown');

    // Checkout redirection
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

});






Route::middleware(['auth'])->group(function () {
    // Show the checkout page
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    // Process the checkout (Form Submission)
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.place');

    // Fallback: If someone tries to access place-order via GET (address bar), redirect back to checkout
    Route::get('/checkout/place-order', function() {
        return redirect()->route('checkout.index');
    });

    // Success Page
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
});



// Route::middleware(['auth'])->group(function () {
//     Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
//     Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    // 1. Main Page: List all orders
    Route::get('/ordersmanagements', [OrderController::class, 'index'])->name('admin.ordersmanagements');

    // 2. AJAX: Fetch details for a specific order (for the View modal)
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');

    // 3. AJAX: Update the order status in the database
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

});